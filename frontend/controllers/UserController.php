<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\User;

class UserController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['profile'],
                'rules' => [
                    [
                        'actions' => ['profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['success', 'fail'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

	public function actions() {
    	$this->layout = 'profile';

        $this->enableCsrfValidation = false;
    }

    public function actionIndex()
    {
        return $this->redirect('/user/profile');
    }

    public function actionProfile() {
    	return $this->render('index');	
    }

    public function actionSuccess()
    {
        $req = Yii::$app->request;

        $custom = $req->post('custom', "");
        $params = explode('_', $custom);

        if (sizeof($params) > 1) {
            $user = User::findOne($params[0]);
            if ($user) {
                $user->plan = $params[1];
                $user->save();
                return "Success";
            }
        }
        return "Fail";
    }

    public function actionFail()
    {

    }

    public function actionPaypallistener()
    {

    }

}
