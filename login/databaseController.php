<?php
session_start();

include("model/Login.php");
include("model/Haslo.php");
include("model/DataBase.php");
include("model/NoUserException.php");

$login = @new Login($_SESSION['login']);
$haslo = @new Haslo($_SESSION['haslo']);

unset($_SESSION['login']);
unset($_SESSION['haslo']);

//echo $login->login;
//echo $haslo->haslo;

$db = new DataBase("localhost", "users", "root", "", "users");

/*try{
	$count = $db->getNumberOfRows("SELECT * FROM users WHERE login='".$login->login."' AND password='".$haslo->haslo."'");
	echo $count;
	exit();
	if($count < 1){
		throw new NoUserException("Nie ma takiego użytkownika!");
	}
}
catch(NoUserException $e){
	$_SESSION['noUserError'] = $e->getMessage();
	header("location: login/../index.php");
	exit();
}*/

$user = $db->getUserFromDB("SELECT * FROM users WHERE login='".$login->login."' AND password='".$haslo->haslo."'");

if($user['login'] == $login->login && $user['password'] == $haslo->haslo){
$_SESSION['userId'] = $user['id'];
$_SESSION['userLogin'] = $user['login'];
$_SESSION['userPassword'] = $user['password'];
$_SESSION['userEmail'] = $user['email'];
$_SESSION['userAccess'] = $user['accesslevel'];
$_SESSION['login'] = true;
header("location: main.php");
exit();
}
else{
	header("location: login/../index.php");
	exit();
}




?>