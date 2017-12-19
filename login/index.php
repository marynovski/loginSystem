<?php
session_start();
?>

<!Doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Logowanie</title>
    <style rel="stylesheet">
    
        .form-label{
            display: block;
        }
        
        .error{
            color: red;
        }
        
    </style>
</head>
<body>
	<?php 
        if(isset($_SESSION['noUserError'])){
            echo $_SESSION['noUserError'];
            unset($_SESSION['noUserError']);
        }
    ?>
    <form method="post" action="validateController.php" >
        <label class="form-label" for="login">Login:</label>
        <input type="text" name="login" id="login">
        <br>
        <?php 
            if(isset($_SESSION['loginError'])){
                echo $_SESSION['loginError'];
                unset($_SESSION['loginError']);
            }
        ?>
        <br><br>
        <label class="form-label" for="haslo">Hasło:</label>
        <input type="password" name="haslo" id="haslo">
        <br>
        <?php 
            if(isset($_SESSION['hasloError'])){
                echo $_SESSION['hasloError'];
                unset($_SESSION['hasloError']);
            }
        ?>
        <br><br>
        <input type="submit" value="Zaloguj">

    </form>
</body>
</html>