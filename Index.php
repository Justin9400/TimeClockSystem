<?php

    require_once 'dblogin.php';
    date_default_timezone_set("America/New_York");
    //Justin Kachornvanich 
    //Form to create a new user
    //CS 385
    //HW 9
    //Form to create a new user in the database
    //Requires first name, last name, email, phone number, date of birth, and if they are an admin
    //Prints out the entered information after submitting and reloads back to an empty form
    //Inputs information into the database

    //variable declaration
    if (!empty($_POST))
    {
        //Creates a random 5 digit number for the user id 
        $userID = rand(10000, 99999);
        $_POST["userid"] = $userID;
        //Gets the current time and date
        $date = date('Ymd');
        $time = date("h:i:sa");
        //Checks if the fields for the form are input from the user 
        if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["password"]))
        {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $password = $_POST["password"];
        
            //Sanitizes the input for html 
            $firstName = htmlspecialchars($firstName);
            $lastName = htmlspecialchars($lastName);
            $password = htmlspecialchars($password);
    
            $username = $firstName;
            //Encrypts the password
            $pass = password_hash($password, PASSWORD_DEFAULT);
    
            //Inputs the new users information into the database
            $stmt = $pdo->prepare("INSERT INTO userid VALUES (?, ?, ?, ?, ?)");
            $stmt -> bindParam(1, $userID, PDO::PARAM_INT, 5);
            $stmt -> bindParam(2, $_POST["firstName"], PDO::PARAM_STR);
            $stmt -> bindParam(3, $_POST["lastName"], PDO::PARAM_STR);
            $stmt -> bindParam(4, $_POST["Admin"], PDO::PARAM_STR);
            $stmt -> bindParam(5, $pass, PDO::PARAM_STR);
            $stmt -> execute();
        }
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
    <?php include('header.php') ?>
    <div class = "label"> 
        <form method="post" action="Index.php">
            <center>
                <!-- Text Fields -->
                <font size='+2'>
                    First Name <center><input type = "text" name = "firstName" class="newUserInput" required="required"></center></br> 
                    Last Name <center><input type = "text" name = "lastName" class="newUserInput" required="required"></center></br>
                    Password <center><input type = "password" name = "password" class="newUserInput" required="required"></center></br>

                    Is this new user an admin </br>

                    <!-- radio buttons -->
                    <input type="radio" name="Admin" value="Yes" required>
                    <label for = "Yes"> Yes </label><br>
                    <input type="radio" name="Admin" value="No">
                    <label for = "No"> No </label><br><br>
                </font>
                <!-- Submit Button -->
                <input type = "submit" value = "Create User"> <br><br>
            </center>
        </form>
        <form method="post">	
            <center>
                <input type = "hidden" value = "True" name = "isLoggedOut">
                <input type = "submit" class = "button" value = "LogOut" formaction = "home.php">
            </center>
        </form>
    </div>
    <!-- Footer -->
	<?php include('footer.php') ?>
</body>
</html>

<?php

    //Prints out the user input after the form is submitted
    if (!empty($_POST))
    {
        //Echos the value of the keys if the index of the map is not empty
        if (!empty($_POST["firstName"])) 
        {
            echo("<br><center> First Name: $firstName </center>");
        } 
        if (!empty($_POST["lastName"])) 
        {
            echo("<center> Last Name: $lastName </center");
            echo "<br>";
        } 
        if (!empty($_POST["password"])) 
        {
            echo("<center> Password: $password </center");
            echo "<br>";
        } 
        if(isset($_POST["Admin"]))
        {
            $Admin = $_POST["Admin"];
            echo ("<center> Is this user an admin: $Admin </center>");
        }
        else if(isset($_POST["Admin"]))
        {
            $Admin = $_POST["Admin"];
            echo ("<center> Is this user an admin: $Admin </center>");
            echo "<br><br>";
        }
        if(!empty($_POST["firstName"]))
        {
            echo("<center> New Users ID: $userID </center>");
            echo("New User Created Successful");
        }
    }
?>