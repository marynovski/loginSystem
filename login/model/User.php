<?php

class User{

	private $id;
	private $login;
	private $password;
	private $email;
	private $accessLevel;

	function __construct($id, $login, $password, $email, $accessLevel){
		$this->id = $id;
		$this->login = $login;
		$this->password = $password;
		$this->email = $email;
		$this->accessLevel = $accessLevel;
	}

	function __get($data){
		return $this->$data;
	}
}

?>