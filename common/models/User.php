<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    const ROLE_USER = 1;
    const ROLE_MODER = 5;
    const ROLE_ADMIN = 10;

    public $profile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         TimestampBehavior::className(),
    //     ];
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['eauth_id', 'eauth_service'], 'string'],
            [['plan'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

     /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function isTrial() {
        if(!Yii::$app->user->isGuest) {
            $trial_last = floor( ( ( ( time() - strtotime( Yii::$app->user->identity->created_at ) ) / 60 ) / 60 ) / 24 );
            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/trialday.txt', $trial_last);
            $trial_days = 14;
            if($trial_last > $trial_days)
                return false;
            else 
                return true;
        }
        else {
            return false;
        }
    }

    public function mbPay() {
        // 1 plan
        if(Yii::$app->user->identity->plan == 1) {
            return "BASIC";
        }
        // 2 plan
        elseif(Yii::$app->user->identity->plan == 2) {
            return "FULL";
        }
        else {
            return false;
        }
    }

    // public static function findIdentity($id) {
    //     if (Yii::$app->getSession()->has('user-'.$id)) {
    //         return new self(Yii::$app->getSession()->get('user-'.$id));
    //     }
    //     else {
    //         return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    //     }
    // }

    /**
     * @param \nodge\eauth\ServiceBase $service
     * @return User
     * @throws ErrorException
     */
    public static function findByEAuth($service) {
        if (!$service->getIsAuthenticated()) {
            throw new ErrorException('EAuth user should be authenticated before creating identity.');
        }

        $user = self::find()
            ->where([
                'eauth_service' => $service->getServiceName(), 
                'eauth_id' => $service->getId()
            ])
            ->one();
        
        if ($user == null) {
            // print_r($service->attributes);
            // exit;
            $username = $service->getAttribute('username');
            $username = $username ? $username : "id".$service->getId();
            $user = new User([
                'username' =>  $username,
                'password' => Yii::$app->security->generateRandomString(6),
                'status' => self::STATUS_ACTIVE,
                'name' => $service->getAttribute('name') ? $service->getAttribute('name') : $service->getAttribute('username'),
                'email' => $service->getAttribute('email'),
                'eauth_service' => (string) $service->getServiceName(), 
                'eauth_id' => (string) $service->getId()
            ]);
            $user->generateAuthKey();
            $user->save();
        }

        return $user;
    }
}
