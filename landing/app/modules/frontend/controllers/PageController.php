<?php

class PageController extends IndexController
{

	public function actionIndex()
	{
		$this->view = 'page';
		if ($id = core::$app->request->get('page')) {
			$page = core::$app->db->get('pages', '*', ['id[=]' => $id]);
			$this->design->assign('page', $page);
			$this->pageTitle = $page['name'];
		}else
			core::$app->application->redirect('/');
	}

}