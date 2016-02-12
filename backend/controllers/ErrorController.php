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
class ErrorController extends Controller
{
	public function actionIndex() {
		$this->layout = 'error';
		$this->render('index');
	}
}