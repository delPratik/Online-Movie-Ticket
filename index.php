<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movies</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    /* Add custom styles here */

    /* Include the styles from the original CSS */
    .movies-heading {
      text-align: center;
    }

    .card {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }

    .card-body {
      flex-grow: 1;
    }

    .book-btn-container {
      display: none;
      justify-content: center;
      align-items: center;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      transition: opacity 0.3s;
    }

    .card:hover .book-btn-container {
      display: flex;
    }

    .book-btn-container .book-btn {
      display: none;
    }

    .card:hover .book-btn-container .book-btn {
      display: block;
    }

    .poster-img {
      height: 300px;
      object-fit: cover;
    }

    .pay-btn {
      background-color: green;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h1 class="movies-heading">Movies</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <!-- Now Showing -->
        <h2 class="mt-4">Now Showing</h2>
        <div class="row">
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "movie";

          // Create a connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check the connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Retrieve movies that are now showing
          $nowShowingQuery = "SELECT * FROM movie WHERE release_date <= CURDATE()";
          $nowShowingResult = $conn->query($nowShowingQuery);

          if ($nowShowingResult->num_rows > 0) {
            while ($row = $nowShowingResult->fetch_assoc()) {
              echo '<div class="col-md-4">
                      <div class="card mb-4">
                        <div class="poster-img-container">
                          <img src="' . $row["poster"] . '" alt="' . $row["name"] . '" class="card-img-top poster-img">
                          <div class="book-btn-container">
                            <a href="https://www.esewa.com.np" class="btn btn-primary pay-btn">Pay via eSewa</a>
                          </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">' . $row["name"] . '</h5>
                          <p class="card-text">Release Date: ' . $row["release_date"] . '</p>
                        </div>
                      </div>
                    </div>';
            }
          } else {
            echo '<p>No movies currently showing.</p>';
          }

          // Close the database connection
          $conn->close();
          ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <!-- Coming Soon -->
        <h2 class="mt-4">Coming Soon</h2>
        <div class="row">
          <?php
          // Create a new connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check the connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Retrieve movies that are coming soon
          $comingSoonQuery = "SELECT * FROM movie WHERE release_date > CURDATE()";
          $comingSoonResult = $conn->query($comingSoonQuery);

          // Display movies coming soon
          if ($comingSoonResult->num_rows > 0) {
            while ($row = $comingSoonResult->fetch_assoc()) {
              echo '<div class="col-md-4">
                      <div class="card mb-4">
                        <div class="poster-img-container">
                          <img src="' . $row["poster"] . '" alt="' . $row["name"] . '" class="card-img-top poster-img">
                          <div class="book-btn-container">
                            <a href="https://www.esewa.com.np" class="btn btn-primary pay-btn">Pay via eSewa</a>
                          </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">' . $row["name"] . '</h5>
                          <p class="card-text">Release Date: ' . $row["release_date"] . '</p>
                        </div>
                      </div>
                    </div>';
            }
          } else {
            echo '<p>No movies coming soon.</p>';
          }

          // Close the database connection
          $conn->close();
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
