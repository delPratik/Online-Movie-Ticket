<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $releaseDate = $_POST["release_date"];
    $poster = $_POST["poster_url"];

    // Prepare SQL statement
    $sql = "INSERT INTO movie (name, release_date, poster) VALUES ('$name', '$releaseDate', '$poster')";

    if ($conn->query($sql) === TRUE) {
        // Insertion successful
        $message = '<div class="alert alert-success">Movie added successfully.</div>';
    } else {
        // Error in insertion
        $message = '<div class="alert alert-danger">Failed to add movie. Error: ' . $conn->error . '</div>';
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin - Movie Ticket Online System</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-container .btn {
            margin-right: 10px;
        }

        /* Custom CSS for aligning the "Choose File" button */
        .custom-file-input:lang(en)~.custom-file-label::after {
            content: "Browse";
        }

        .custom-file-label {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Movie</h1>

        <div class="form-container">
            <!-- Movie form -->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <?php echo $message; ?>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="release_date">Release Date:</label>
                    <input type="date" class="form-control" id="release_date" name="release_date" required>
                </div>
                <div class="form-group">
                    <label for="poster_url">Poster URL:</label>
                    <input type="text" class="form-control" id="poster_url" name="poster_url" required>
                </div>

                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Add Movie</button>
                    <a href="manage_movies.php" class="btn btn-success">Go Back</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
