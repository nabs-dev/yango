<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "u8gr0sjr9p4p4";
$password = "9yxuqyo3mt85";
$dbname = "dbgcxltbsdpgki";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = "";

// Handle ride booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_ride'])) {
    $pickup = $_POST['pickup'];
    $dropoff = $_POST['dropoff'];

    // Insert the ride booking into the database
    $sql = "INSERT INTO ride_bookings (pickup, dropoff) VALUES ('$pickup', '$dropoff')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Ride booked successfully!";  // Success message
    } else {
        $successMessage = "Error booking ride: " . $conn->error;  // Error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yango Clone - Book a Ride</title>
    <style>
        /* Internal CSS for styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #4caf50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .form-container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .fare-estimation {
            margin-top: 20px;
            font-size: 18px;
        }

        .success-message {
            font-size: 18px;
            color: #4caf50;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Welcome to Yango Clone</h1>
        <p>Book your ride with us now!</p>
    </div>

    <div class="form-container">
        <h2>Book a Ride</h2>

        <!-- Display success message here if available -->
        <?php if ($successMessage) { ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php } ?>

        <form method="POST" action="index.php">
            <input type="text" class="input-field" id="pickup" name="pickup" placeholder="Enter Pickup Location" required>
            <input type="text" class="input-field" id="dropoff" name="dropoff" placeholder="Enter Dropoff Location" required>
            <button type="submit" name="book_ride" class="button">Book Now</button>
        </form>

        <div class="fare-estimation">
            <p>Estimated Fare: $<span id="fareEstimate">10</span></p>
        </div>

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <script>
        document.getElementById('pickup').addEventListener('input', estimateFare);
        document.getElementById('dropoff').addEventListener('input', estimateFare);

        function estimateFare() {
            const pickup = document.getElementById('pickup').value;
            const dropoff = document.getElementById('dropoff').value;

            if (pickup && dropoff) {
                // A mock-up for fare estimation (You can replace it with your logic)
                const estimatedFare = Math.floor(Math.random() * 100 + 10); // Random fare
                document.getElementById('fareEstimate').innerText = estimatedFare;
            }
        }
    </script>

</body>
</html>

<?php
$conn->close();
?>
