<?php
session_start();

if($_SESSION['login'] != true){
	header("location: index.php");
}

include("model/User.php");

$user = new User(($_SESSION['userId']), ($_SESSION['userLogin']), ($_SESSION['userPassword']), ($_SESSION['userEmail']), ($_SESSION['userAccess']));

echo "Jesteś zalogowany jako ".$user->login.' <a href="logout.php" title="Logout!">Wyloguj</a>';




?>