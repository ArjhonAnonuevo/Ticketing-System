<?php
 $database = "ticketing-system";
 $host = "localhost";
 $username = "root";
 $password = "";


 $conn = new mysqli($host, $database,$username, $password);
    if ($conn->connect_error){
        die("Connection failed". $conn->connect_error);
    }
?>