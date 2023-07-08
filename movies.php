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
    .navbar-custom {
      background-color: #000;
      height: 45px;
      margin-top: 15px;
    }

    .navbar-brand {
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      margin-right: 20px;
      line-height: 45px;
    }

    .navbar-nav .nav-link {
      color: #fff;
      font-size: 18px;
      margin-right: 15px;
    }

    .navbar-nav .nav-link:hover {
      color: #f8f9fa;
    }

    .search-form {
      position: relative;
      display: flex;
      align-items: center;
    }

    .search-form input[type="text"] {
      background-color: #222;
      border: none;
      border-radius: 20px;
      color: #fff;
      padding: 8px 40px 8px 15px;
      width: 200px;
    }

    .search-form .btn-search {
      background-color: transparent;
      border: none;
      color: #fff;
      cursor: pointer;
      font-size: 20px;
      position: absolute;
      right: 20px;
    }

    .login-button {
      color: #ccc;
      font-size: 24px;
    }

    .login-button:hover {
      color: #f8f9fa;
    }

    .footer {
      background-color: #000;
      color: #fff;
      padding: 10px;
      width: 100%;
      font-size: 20px;
      text-align: center;
    }

    .footer p {
      margin-bottom: 0;
    }

    .movies-heading {
      text-align: center;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">
      PG CINEMAS
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="movie.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Movies<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="theaters.php">Theaters</a>
        </li>
      </ul>
      <form class="form-inline ml-auto search-form">
        <input class="form-control" type="text" placeholder="Search">
        <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
      </form>
      <a class="nav-link login-button" href="login.php">
        <i class="fa fa-user-circle"></i>
      </a>
    </div>
  </nav>

  <!-- Content -->
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
                        <img src="' . $row["poster"] . '" alt="' . $row["name"] . '" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">' . $row["name"] . '</h5>
                          <p class="card-text">Release Date: ' . $row["release_date"] . '</p>
                          <a href="#" class="btn btn-primary book-btn">Book</a>
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
                        <img src="' . $row["poster"] . '" alt="' . $row["name"] . '" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">' . $row["name"] . '</h5>
                          <p class="card-text">Release Date: ' . $row["release_date"] . '</p>
                          <a href="#" class="btn btn-primary book-btn">Book</a>
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

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2023 PG CINEMAS. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
  // Add event listener to book buttons
  var bookBtns = document.querySelectorAll('.book-btn');
  bookBtns.forEach(function (btn) {
    btn.addEventListener('click', function (event) {
      event.preventDefault();
      alert("Please login to continue booking.");
      window.location.href = "login.php";
    });
  });
</script>

</body>

</html>
