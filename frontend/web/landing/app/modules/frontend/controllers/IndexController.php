<?php

class IndexController extends Controller
{

	public function always()
	{
		$this->design->assign('pages', core::$app->db->select('pages', '*'));
	}

}