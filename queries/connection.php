<?php
require_once 'vendor/autoload.php';

// Load environment variables from the .env file
Dotenv\Dotenv::createImmutable(__DIR__)->load();

// Retrieve the environment variables
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
