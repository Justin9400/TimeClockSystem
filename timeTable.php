<?php
    //Justin Kachornvanich 
    //Gets and prints the time table from the database 
    //CS 385 
    //Sprin 2022

    require_once("dbLogin.php");
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "timeclocksystem";

    //Connects to the database
    $conn = new mysqli($host, $user, $pass, $data);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //Pulls the table out from the database
    $sql = "SELECT ID,  ClockInDate, ClockInTime, ClockOutDate, ClockOutTime FROM timetable";
    $result = $conn->query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="en-us" http-equiv="Content-Language"/>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Homework 9 CS 385</title>
</head> 

<body>
	<!-- Header -->
	<?php include('header.php') ?>
    
    <?php 
        //Prints the time table 
        if ($result->num_rows > 0) 
        {
            echo("<center>");
                echo("<font size='+2'>");
                    echo("<table border>");
                        echo("<tr>");
                            echo("<th> ID </th>");
                            echo("<th> Clock In Date </th>");
                            echo("<th> Clock In Time </th>");
                            echo("<th> Clock Out Date </th>");
                            echo("<th> Clock Out Time </th>");
                        echo("</tr>");
            while($row = $result->fetch_assoc()) 
            {
                echo("<tr>");
                        echo ("<td>");
                            echo $row["ID"];
                        echo ("</td>");

                        echo ("<td>");
                            echo $row["ClockInDate"];
                        echo ("</td>");

                        echo ("<td>");
                            echo $row["ClockInTime"];
                        echo ("</td>");

                        echo ("<td>");
                            echo $row["ClockOutDate"];
                        echo ("</td>");

                        echo ("<td>");
                            echo $row["ClockOutTime"];
                        echo ("</td>");
                    echo("</tr>");
            }
                    echo("</table>");
                echo("</font>");
            echo("</center>");
        }
        $conn->close();
    ?>

        <form method="post">	
            <center>
                <br><br>
                <input type = "hidden" value = "True" name = "isLoggedOut">
                <input type = "submit" class = "button" value = "LogOut" formaction = "home.php">
            </center>
        </form>

	<!-- Footer -->
	<?php include('footer.php') ?>
</body>
</html>