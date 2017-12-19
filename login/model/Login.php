<?php

class Login{

	private $login;

	function __construct($login){
		$this->login = $login;
	}

	function __get($login){
		return $this->login;
	}
}

?>