<?php

namespace common\models;

use Yii;
use yii\base\Controller;
use yii\helpers\ArrayHelper;
use common\models\Pages;
use yii\helpers\Url;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $type
 * @property string $url
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 1],
            [['menu'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
            'type' => 'Type',
            'url' => 'Url',
        ];
    }

    public function show($type = 'T') {
        $model = new Controller;
        $userMenu = ArrayHelper::map(self::find()->where(['type' => $type])->all(), 'title', 'url');
        $pageMenu = ArrayHelper::map(Pages::find()->where(['menu' => $type])->all(), 'title', 'url');
        foreach ($pageMenu as $title => $url) {
            $pageMenu[$title] = Url::toRoute(['/page/view', 'url' => $url]);
        }
        $items = array_merge($userMenu, $pageMenu);
        return $model->renderPartial('/report/menu', ['items' => $items]);
    }
}
