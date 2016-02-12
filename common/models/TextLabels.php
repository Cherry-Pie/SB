<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "text_labels".
 *
 * @property integer $id
 * @property integer $option_name
 * @property integer $code
 * @property integer $value
 */
class TextLabels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'text_labels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_name', 'code', 'value'], 'string'],
            [['code'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'option_name' => 'Option Name',
            'code' => 'Code',
            'value' => 'Value',
        ];
    }

    public function text($code, $encode = false) {
        if($encode)
            return Html::encode(self::findOne(['code' => $code])->value);
        else 
            return self::findOne(['code' => $code])->value;
    }
}
