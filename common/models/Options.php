<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property string $label
 * @property string $value
 * @property string $type
 * @property string $compare
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['compare'], 'string'],
            [['label', 'value'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'value' => 'Value',
            'type' => 'Type',
            'compare' => 'Compare',
        ];
    }

    public static function getCompare($compare, $option = null) {
        if(class_exists($compare)) {
            $model = new $compare;
            if(is_array($option)) {
                return $model->find()->where($option)->all();
            }
            else {
                return $model->find()->all();
            }
        }
        else {
            throw new \yii\web\HttpException(500, 'System fatal error.', 500);
        }
    }

    public static function get($id) {
        return self::findOne($id);
    }

    public function saveOption($dataArray) {
        if(is_array($dataArray)) {
            foreach ($dataArray['fields'] as $id => $value) {
                $item = self::get($id);
                $item->value = $value;
                if(!$item->save()) {
                    return false;
                }
            }
            return true;
        }
        else {
            return false;
        }
    }
}
