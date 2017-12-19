<?php
session_start();
include("model/Login.php");
include("model/Haslo.php");
include("model/ValidateLogin.php");
include("model/ValidateHaslo.php");
include("model/ValidateLoginException.php");
include("model/ValidateHasloException.php");

$login = new Login($_POST['login']);
$haslo = new Haslo($_POST['haslo']);

$ok = TRUE;

$validateLogin = new ValidateLogin($login->login);
$validateHaslo = new ValidateHaslo($haslo->haslo);

try{
	if(!$validateLogin->validateLogin()){
		
		throw new ValidateLoginException("Niepoprawny login!");
	}
}catch(ValidateLoginException $e){
	$_SESSION['loginError'] = $e->getMessage();
	$ok = FALSE;
}

try{
	if(!$validateHaslo->validateHaslo()){
		
		throw new ValidateHasloException("Niepoprawne hasło!");
	}
}
catch(ValidateHasloException $e){
	$_SESSION['hasloError'] = $e->getMessage();
	$ok = FALSE;
}

if(!$ok){
	header("location: login/../index.php");
	exit();
}
else{
	$_SESSION['login'] = $login->login;
	$_SESSION['haslo'] = $haslo->haslo;
	header("location: databaseController.php");
}
?>