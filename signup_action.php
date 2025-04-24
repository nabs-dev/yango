<?php
// Database connection
$conn = new mysqli('localhost', 'u8gr0sjr9p4p4', '9yxuqyo3mt85', 'dbgcxltbsdpgki');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully!";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
