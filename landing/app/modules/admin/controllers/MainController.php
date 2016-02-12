<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Тексты';

		$this->view = 'main';

		if ($post = core::$app->request->post()){
			core::$model->users->updateInformation($post);
			$this->design->assign('status', true);
		}
		$this->design->assign('data', json_decode(core::$app->db->get('information', 'json', ['id[=]' => 1])));
	}

}