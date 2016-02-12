<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "popular_domains".
 *
 * @property integer $id
 * @property string $ip
 * @property string $date
 * @property integer $user_id
 */
class PopularDomains extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'popular_domains';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['user_id'], 'integer'],
            [['ip'], 'string', 'max' => 16],
            [['domain'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }

    public static function checkPopular($url) {
        if(self::exists($url, Yii::$app->user->identity->id)) {
            $model = new PopularDomains;
            $model->domain = $url;
            $model->ip = $_SERVER['REMOTE_ADDR'];
            if(Yii::$app->user->identity->id) {
                $model->user_id = Yii::$app->user->identity->id;
            }
            return $model->save();
        }
        else {
            return true;
        }
    }

    public static function exists($url, $user_id = 0) {
        if(Yii::$app->user->identity->id) {
            $user_id = Yii::$app->user->identity->id;
            if(($item = PopularDomains::findOne(['domain' => $url, 'user_id' => $user_id]))) {
                $item->date = date("Y-m-d H:i:s");
                $item->save(false);
                return false;
            }
            else {
                return true;
            }
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
            if(($item = PopularDomains::findOne(['domain' => $url, 'ip' => $ip]))) {
                $item->date = date("Y-m-d H:i:s");
                $item->save(false);
                return false;
            }
            else {
                return true;
            }   
        }
    }

    public static function get() {
        if(Yii::$app->user->identity->id) {
            $user_id = Yii::$app->user->identity->id;
            return PopularDomains::find()->where(['user_id' => $user_id])->orderBy(['date'=> SORT_DESC])->select('domain')->distinct()->all();
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
            return PopularDomains::find()->where(['ip' => $ip])->orderBy(['date'=> SORT_DESC])->select('domain')->distinct()->all();
        }   
    }
}
