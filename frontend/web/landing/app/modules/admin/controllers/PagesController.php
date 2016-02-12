<?php

class PagesController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Страници';
		$this->view = 'pages';
		$this->design->assign('pages', core::$model->main->getPages());
	}
	public function actionEdit(){
		$this->view = 'page_edit';
		if ($id = core::$app->request->get('edit')) {
			if ($page = core::$app->request->post('page'))
				if (core::$model->main->updatePage($id, $page))
					$this->design->assign('success', 'Страница успешно обновленна');
			$this->design->assign('page', core::$model->main->getPage($id));
		}else{
			$this->pageTitle = 'Добавить новую';
			if (core::$app->request->post('page')) {
				$id = core::$model->main->addPage(core::$app->request->post('page'));
				$id ? core::$app->application->redirect('/admin/pages/edit/'.$id) : false;
			}
		}
	}
	public function actionDelete(){
		if ($id = core::$app->request->get('delete'))
			core::$model->main->deletePage($id);
		core::$app->application->redirect('/admin/pages');
	}
}
