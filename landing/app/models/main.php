<?php

class main extends Model
{

	public function access($status, $controller)
	{
		if ($status && $controller != 'LoginController')
			core::$app->application->redirect('/admin/login', true, 'Доступ запрещенн');
	}

	public function addPage($page){
		return core::$app->db->insert('pages', ['name' => $page['name'], 'body' => $page['body']]);
	}

	public function updatePage($id, $page){
		return core::$app->db->update('pages', ['name' => $page['name'], 'body' => $page['body']], ['id[=]' => $id]);
	}

	public function getPage($id){
		return core::$app->db->get('pages', '*', ['id[=]' => $id]);
	}

	public function getPages(){
		return core::$app->db->select('pages', '*');
	}

	public function deletePage($id){
		return core::$app->db->delete('pages', ['id[=]' => $id]);
	}

}