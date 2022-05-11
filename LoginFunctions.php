<?php
    //Justin Kachornvanich 
    //Functions to deal with the user interaction and input 
    //CS 385 
    //Sprin 2022

    //Processes the user id number and password input 
    function processLogin ($pdo)
    {
        //If the id number and password are given by the user
        if (isset($_POST['idNumber']) && isset($_POST['password']))
        {
            //Finds the row with the id number given by the user
            $stmt = $pdo->prepare("SELECT * FROM userid WHERE ID = ?");
            $stmt -> bindParam(1, $_POST["idNumber"], PDO::PARAM_INT, 5);
            $stmt -> execute();
            $row = $stmt->fetch();

            //Checks if the password is incorrect
            if (empty($row['ID']) || empty($row['Password']) || ! password_verify($_POST['password'], $row['Password']))
            {
                echo("<div class = 'f1'>");
                    echo("<div class = 'centerBorder'>");
                        echo("User ID or password does not exist");
                    echo("</div>");
                echo("</div>");
            }
            //If the password and user id number is correct 
            else
            {                        
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['LAST_ACTIVITY'] = time();
                $_SESSION['userId'] = $row['ID'];
    
                if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] || $_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT'])
                    logout();
                    
                if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
                    different_user();

                $id = $_POST['idNumber'];    
                $date = date("Y-m-d");
                $time = date("H:i:s", strtotime('-6 hours'));

                //If the user clicks the clock in button
                if (isset($_POST['clockIn']))
                {
                    //Pulls out a row where the clock out time and date is null to check if the user can clock in 
                    $stmt = $pdo->prepare("SELECT ClockOutDate, ClockOutTime FROM timetable WHERE ClockOutDate IS NULL AND ID = $id");
                    $stmt -> execute();

                    $row_cnt = $stmt->rowCount();

                    //If there is no row pulled out then the user can clock in
                    if ($row_cnt == 0) 
                    {
                        echo("<div class = 'f1'>");  
                            echo("<div class = 'centerBorder'>");
                                echo("Clock In Successful");
                            echo("</div>");
                        echo("</div>");

                        //Inserts the clock in time and date into the time table
                        $stmt = $pdo->prepare("INSERT INTO timetable (ID, ClockInDate, ClockInTime) VALUES (?, ?, ?)");
                        $stmt -> bindParam(1, $_POST["idNumber"], PDO::PARAM_INT, 5);
                        $stmt -> bindParam(2, $date, PDO::PARAM_STR);
                        $stmt -> bindParam(3, $time, PDO::PARAM_STR);
                        $stmt -> execute(); 
                    } 
                    //If there is a row that is pulled out then the user cannot clock in because they have not clocked out yet
                    else if ($row_cnt == 1) 
                    {
                        echo("<div class = 'f1'>");  
                            echo("<div class = 'centerBorder'>");
                                echo("You forgot to previously clock out. Please clock out before trying to clock in");
                            echo("</div>");
                        echo("</div>");
                    }
                }
                //If the user clicks the clock out button 
                else if (isset($_POST['clockOut']))
                {
                    //Pulls out a row where clock out time and date are null 
                    $stmt = $pdo->prepare("SELECT ClockOutDate, ClockOutTime FROM timetable WHERE ClockOutDate IS NULL AND ID = $id");
                    $stmt -> execute();
                    
                    $row_cnt = $stmt->rowCount();

                    //If a row is not pulled out then the user cannot clock out because they have not clocked in yet 
                    if ($row_cnt == 0)
                    {
                        echo("<div class = 'f1'>");  
                            echo("<div class = 'centerBorder'>");
                                echo("You must clock in before you can clock out");
                            echo("</div>");
                        echo("</div>");
                    }
                    //If a row is pulled out then the user can clock out 
                    else if ($row_cnt == 1)
                    {
                        echo("<div class = 'f1'>");  
                            echo("<div class = 'centerBorder'>");
                                echo("Clock Out Successful");
                            echo("</div>");
                        echo("</div>");

                        //Inserts Clockout time and date into the time table
                        $stmt = $pdo->prepare("UPDATE timetable SET ClockOutDate = ? , ClockOutTime = ? where ID = $id AND ClockOutTime IS NULL");
                        $stmt -> bindParam(1, $date, PDO::PARAM_STR);
                        $stmt -> bindParam(2, $time, PDO::PARAM_STR);
                        $stmt -> execute();
                    }
                }
                //If the user clicks the login button 
                else if (isset($_POST['Login']))
                {
                    //Shows the user that they have clocked in successfully 
                    echo("<div class = 'f1'>");  
                        echo("<div class = 'centerBorder'>");
                            echo("Login Successful");
                        echo("</div>");
                    echo("</div>");
                    
                    //Buttons to either log out or go to the time table
                    echo("<form method='post'>");
                        echo("<div class = 'form'>");
                            echo("<div class = 'centerLogout'>");
                                echo("<input type = 'hidden' value = 'True' name = 'isLoggedOut'>");
                                echo("<input type = 'submit' class = 'button' value = 'Create New User' formaction = 'Index.php'>");
                                echo("<input type = 'submit' class = 'button' value = 'Time Table' formaction = 'timeTable.php'>");
                            echo("</div>");
                        echo("</div>");
                    echo("</form>");
                }
            }
        }
    }


    //Function to destroy the session and time outs
    function logout()
    {
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
    }
?>
