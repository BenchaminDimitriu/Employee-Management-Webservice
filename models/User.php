<?php

namespace Sys_Dev_Project\models;

class Login extends \app\core\Models{

	public function get($username){
		$SQL = "SELECT * FROM login WHERE username=:username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Login');
		return $STMT->fetch();
	}

}
