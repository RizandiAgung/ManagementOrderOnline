<?php
$host = 'localhost';
$user = 'root';
$pass = '240504';
$db_name = 'order_management';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
