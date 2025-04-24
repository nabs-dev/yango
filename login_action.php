<?php
// Database connection
$conn = new mysqli('localhost', 'u8gr0sjr9p4p4', '9yxuqyo3mt85', 'dbgcxltbsdpgki');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Start session and redirect to the homepage
            session_start();
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
        } else {
            echo "Invalid credentials!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>
