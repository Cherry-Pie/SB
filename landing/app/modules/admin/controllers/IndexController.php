<?php

class IndexController extends Controller
{

	public function always()
	{
		core::$model->main->access(!core::$model->users->checkAuth(), get_class($this));

		if (core::$app->request->get('logout')){
			core::$model->users->logout();
			return core::$app->application->redirect('/admin/login', true, 'Доступ запрещенн');
		}

		$this->design->assign('controller', get_class($this));
	}

	public function isError($code = false){

	}

}