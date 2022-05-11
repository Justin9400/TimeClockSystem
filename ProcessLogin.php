<?php
    //Justin Kachornvanich 
    //Processes the user input timeouts 
    //CS 385
    //Spring 2022

    //Start the session
    session_start();

    require_once 'dblogin.php';
    include 'LoginFunctions.php';

    processLogin ($pdo);
 
    //If the user clicks the log out button
    if (isset($_POST['isLoggedOut']))
    {
        logout();
    }

    //If time out is reached then log the user out 
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 15000))
    {
        logout(); 
        header("Location: C:/xampp/htdocs/JustinK/Justin Kachornvanich CS 385 HW 9/home.php");
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="en-us" http-equiv="Content-Language"/>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
<link rel="stylesheet" href="style.css" type="text/css"/>
<title>Homework 9 CS 385</title>
</head> 
<body>
    <!-- Header -->
    <?php include('header.php') ?>
    
    <form method="post">	
        <div class = "form">
            <div class = "centerLogout">
                <input type = "hidden" value = "True" name = "isLoggedOut">
                <input type = "submit" class = "button" value = "LogOut" formaction = "home.php">
            </div>
        </div>
    </form>
    	
    <!-- Footer -->
	<?php include('footer.php') ?>
</body>
</html>