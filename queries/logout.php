<?php
include "../queries/connection.php";
session_start();

session_unset();
header("location: /../ticketing_system/index.html");