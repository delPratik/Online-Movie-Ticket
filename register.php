<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group .button-container {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Establish a connection to your MySQL database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "movie";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Define variables to store user input
            $name = $_POST["name"];
            $phone_number = $_POST["phone_number"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Insert data into the freelancer table
            $sql = "INSERT INTO client (name, phone_number, email, password)
                    VALUES ('$name','$phone_number', '$email', '$password')";

            if ($conn->query($sql) === true) {
                echo "<p>Registration successful!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <div class="button-container">
                    <button type="submit" name="register">Register</button>
                </div>
                <div class="button-container">
                    <button type="button" onclick="location.href='login.php';">Back to Login</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
