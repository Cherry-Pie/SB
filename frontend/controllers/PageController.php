<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Pages;

class PageController extends Controller
{
	public function actions() {
		$this->layout = 'site';
	}

	public function actionView($url) {
		$page = Pages::findOne(['url' => $url]);
		if($page) {
			return $this->render('/pages/view', ['page' => $page]);
		}
		else {
			return $this->render('/pages/404', ['url' => $url]);	
		}
	}
}

?>