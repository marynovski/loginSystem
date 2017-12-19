<?php

class ValidateHaslo{

	private $haslo;

	function __construct($haslo){
		$this->haslo = $haslo;
	}

	public function validateHaslo(){
		return preg_match("/^[a-zA-Z0-9]{8,30}$/", $this->haslo);
	}

}


?>