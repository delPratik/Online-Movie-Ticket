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

// Function to fetch movie data from the database
function fetchMovies($table)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $movies = array();
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        return $movies;
    } else {
        return false;
    }
}

// Function to delete movie data from the database
function deleteMovie($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Fetch movie data
$movies = fetchMovies("movie");

// Delete movie data if submitted
if (isset($_POST['delete'])) {
    $table = $_POST['table'];
    $id = $_POST['id'];

    if (deleteMovie($table, $id)) {
        echo '<div class="alert alert-success">Movie deleted successfully.</div>';
    } else {
        echo '<div class="alert alert-danger">Failed to delete movie.</div>';
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
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
        }

        .table th:nth-child(5),
        .table td:nth-child(5) {
            text-align: center;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            position: sticky;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Manage Movies</h1>

        <!-- Display movies table -->

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Release Date</th>
                    <th>Poster</th>
                    <th>Perform Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($movies) : ?>
                    <?php foreach ($movies as $movie) : ?>
                        <tr>
                            <td><?php echo $movie['id']; ?></td>
                            <td><?php echo $movie['name']; ?></td>
                            <td><?php echo $movie['release_date']; ?></td>
                            <td><img src="<?php echo $movie['poster']; ?>" width="100" height="150" alt="Movie Poster"></td>
                            <td>
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="table" value="movie">
                                    <input type="hidden" name="id" value="<?php echo $movie['id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No movies found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer class="footer">
        <a href="add_movie.php" class="btn btn-primary">Add Movie</a>
        <a href="logout.php" class="btn btn-success">Logout</a>
        <a href="admin.php" class="btn btn-success">Go Back</a>
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
