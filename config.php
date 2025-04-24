<?php
// DB connection setup
$servername = "localhost";
$username = "u8gr0sjr9p4p4";
$password = "9yxuqyo3mt85";
$dbname = "dbgcxltbsdpgki";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
