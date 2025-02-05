<?php
require "connection.php";
header('Content-Type: application/json; charset=utf-8');

if(["REQUEST_METHOD"] === "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    
}