<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staticpages".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $text
 * @property integer $active
 * @property string $date
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staticpages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['active'], 'integer'],
            [['date'], 'safe'],
            [['title', 'url'], 'string', 'max' => 255]
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
            'url' => 'Url',
            'text' => 'Text',
            'active' => 'Active',
            'date' => 'Date',
        ];
    }
}
