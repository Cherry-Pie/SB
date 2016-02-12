<?php

class users extends Model
{

	public function auth($login, $password)
	{
		$pass = md5($password);
		return core::$app->db->get("users", "*", ["AND" => ["login[=]" => $login, "password[=]" => $pass] ]);
	}

	public function checkPass($password){
		$pass = md5($password);
		return core::$app->db->get("users", "*", ["password" => $pass]);
	}

	public function logout(){
		return core::$app->session->delete('user_id');
	}

	public function checkAuth(){
		return core::$app->session->get('user_id');
	}

	public function updateInformation($data){
		return core::$app->db->update('information', ['json' => json_encode($data)], ['id[=]' => 1]);
	}

}