<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class OptionsController extends Controller
{
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

	public function actionIndex() {
		if(Yii::$app->request->post("Options")) {
			if(!$model = Yii::$app->options->saveOption(Yii::$app->request->post("Options"))) {
				throw new \yii\web\HttpException(500, 'System fatal error.', 500);
			}
			else {
				Yii::$app->session->setFlash('success', 'Data was changed.');
			}
		}
		$model = Yii::$app->options->find()->all();
		return $this->render('/options/index', [
			'model' => $model
		]);
	}
}