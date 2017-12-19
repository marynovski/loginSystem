<?php

class NoUserException extends Exception{

	function __toString(){
		return '<span class="error">'.$this->getMessage().'</span>';
	}
}

