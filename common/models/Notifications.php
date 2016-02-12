<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $type
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'access'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'type' => 'Type',
            'access' => 'Access',
        ];
    }

    public function getAll() {
        $result = [];
        foreach(self::find()->all() as $item) {
            if($this->getAccess($item->id)) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function getAccess($id) {
        if($id === false) {
            return false;
        }
        $access = explode(",", str_replace(" ", "", self::findOne($id)->access));
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
