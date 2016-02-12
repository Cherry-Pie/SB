<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\ESputnik;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $name;
    public $password;
    public $agree;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'string'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 3, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['agree', 'required', 'requiredValue' => "Y", 'message' => 'You must agree to Terms of use'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->name = $this->name;
            $user->email = $this->email;
            $user->role = 1;
            $user->created_at = date("Y-m-d H:i:s");
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                
                $this->addESputnikContact($user->name ? $user->name : $user->username, $user->email);

                $u = new \StdClass;
                $u->name = $this->name; 
                $u->email = $this->email; 
                $u->username = $this->username; 
                $u->password = $this->password; 
                
                \Yii::$app->mailer->compose(['html' => 'regAccount-html', 'text' => 'regAccount-text'], ['user' => $u])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($user->email)
                    ->setSubject('Registration successful!')
                    ->send();

                return $user;
            }
        }

        return null;
    }

    protected function addESputnikContact($first_name, $email)
    {
        $sput = ESputnik::getInstance();
        $addressBooks = $sput->getAddressBooks();
        return $sput->asJson()->addContact($first_name, $email, $addressBooks->addressBook->addressBookId);
    }

    public function attributeLabels()
    {
        return [
            'agree' => 'I agree to <a href="#">Terms of use</a>',
        ];
    }
}
