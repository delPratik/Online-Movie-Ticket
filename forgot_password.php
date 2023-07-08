<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .password-reset-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="password-reset-container">
                    <h2 class="text-center">Reset Password</h2>
                    <form id="password-reset-form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" name="confirm_password" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" value="Reset Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Check if the form has been submitted
session_start();

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

    // Retrieve user input from the forgot password form
    $email = $_POST["email"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Check if the new password and confirm password match
    if ($newPassword === $confirmPassword) {
        // Determine the table name based on the email
        $tableName = "";

        // Check each table for the matching email
        $tables = array("client", "admin");
        foreach ($tables as $table) {
            $sql = "SELECT COUNT(*) AS count FROM $table WHERE email = '$email'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if ($row["count"] > 0) {
                $tableName = $table;
                break;
            }
        }

        // Prepare and execute the SQL query to update the password in the appropriate table
        if ($tableName !== "") {
            $sql = "UPDATE $tableName SET password = '$newPassword' WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result === TRUE) {
                // Password update successful
                echo "<script>alert('Password reset successful!');</script>";
            } else {
                // Password update failed
                echo "<script>alert('Password reset failed. Please try again.');</script>";
            }
        } else {
            // Invalid email address
            echo "<script>alert('Invalid email address. Please try again.');</script>";
        }
    } else {
        // Passwords do not match
        echo "<script>alert('New password and confirm password do not match. Please try again.');</script>";
    }

    $conn->close();
    session_destroy();
    // Redirect to the login page
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
}
?>
