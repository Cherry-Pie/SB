<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$var = 'Hello world';

		$this->layout = 'main';

		$this->view = 'main';

		$this->design->assign('data', json_decode(core::$app->db->get('information', 'json', ['id[=]' => 1])));
	}

}