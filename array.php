<?php

//Reads entire file into the array
$arrayLine = file("Time Chart.txt"); 

//Write out each line of the array
foreach($arrayLine as $line)
    echo($line."</br>");

//Prints a new line 
echo("\n");

//Prints the whole array
print_r($arrayLine);

?>
