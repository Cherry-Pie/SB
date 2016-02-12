<?php

namespace common\models;

use Yii;
use frontend\models\Subscribe;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property string $name
 * @property string $subname
 * @property string $code
 * @property string $access
 * @property string $text
 * @property string $button
 * @property integer $active
 * @property string $after_button_a
 * @property string $after_button_href
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'access', 'name', 'button'], 'required'],
            [['text'], 'string'],
            [['active'], 'integer'],
            [['name', 'subname', 'code', 'access', 'button', 'after_button_a', 'after_button_href'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Title',
            'subname' => 'Subname',
            'code' => 'Code',
            'access' => 'Access',
            'text' => 'Text',
            'button' => 'Button',
            'active' => 'Active',
            'after_button_a' => 'After Button A',
            'after_button_href' => 'After Button Href',
        ];
    }

    public function getByCode($code = false) {
        if($code === false) {
            return false;
        }
        return self::find()->where(['code' => $code])->one();
    }

    public function getAccess($code) {
        $active = self::find()->where(['code' => $code])->one()->active;
        if($code === false || $active == 0) {
            return false;
        }
        $access = explode(",", str_replace(" ", "", self::find()->where(['code' => $code])->one()->access));
        if(Yii::$app->user->isGuest) {
            $current = 'guest';
        }
        else {
            if(Yii::$app->people->isTrial()) {
                $current = 'trial';
            }
            else {
                if(Yii::$app->people->mbPay()) {
                    $current = 'registered';
                }else {
                    $current = 'losttrial';   
                }
            }
        }
        return (in_array($current, $access));
    }
}
