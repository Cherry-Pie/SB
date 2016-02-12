<?php

class LoginController extends IndexController
{

	public function actionIndex()
	{

		if (core::$app->session->get('user_id'))
			core::$app->application->redirect('/admin', true);

		$this->pageTitle = 'Вход в систему';

		$this->view = 'login';

		$this->layout = 'login';

		$request = core::$app->request;

		$login = $request->post('login', false);

		$password = $request->post('password', false);

		if ($login && $password){

			if ($user = core::$model->users->auth($login, $password)){

				core::$app->session->set('user_id', $user['id']);

				core::$app->application->redirect('/admin', true);

			}
			else
				$this->design->assign('error', 'Не верный логин или пароль');
		}
	}
}