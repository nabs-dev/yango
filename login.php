<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Yango Clone</title>
    <style>
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
    </style>
</head>
<body>

    <div class="header">
        <h1>Login to Yango Clone</h1>
        <p>Welcome back! Log in to continue your ride booking.</p>
    </div>

    <div class="form-container">
        <h2>Login</h2>
        <form action="login_action.php" method="POST">
            <input type="email" class="input-field" name="email" placeholder="Email" required>
            <input type="password" class="input-field" name="password" placeholder="Password" required>
            <button type="submit" class="button">Login</button>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>

</body>
</html>
