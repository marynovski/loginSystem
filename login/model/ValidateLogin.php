<?php

class ValidateLogin{

	private $login;

	function __construct($login){
		$this->login = $login;
	}

	public function validateLogin(){
		return preg_match("/^[a-zA-Z0-9]{3,20}$/", $this->login);
	}

}


?>