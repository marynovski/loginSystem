<?php

class Haslo{

	private $haslo;

	function __construct($haslo){
		$this->haslo = $haslo;
	}

	function __get($haslo){
		return $this->haslo;
	}
}

?>