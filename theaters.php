<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Theaters</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    /* Add custom styles here */

    /* Center align the content */
    .content {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: calc(100vh - 120px); /* Adjust based on header and footer height */
      flex-wrap: wrap;
    }

    /* Styling for the theater images */
    .theater-image {
      text-align: center;
      margin: 20px;
    }

    .theater-image img {
      max-width: 50%;
      max-height: 50%;
      border-radius: 10px;
    }

    .theater-image svg {
      max-width: 70%;
      max-height: 70%;
      border-radius: 10px;
      transform: scale(0.7); /* Reduce the size by 30% */
    }

    .theater-name {
      margin-top: 10px;
      font-size: 24px;
      font-weight: bold;
    }

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
        <li class="nav-item">
          <a class="nav-link" href="movies.php">Movies</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Theaters<span class="sr-only">(current)</span></a>
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
  <div class="content">
    <div class="theater-image">
      <img src="fcube.jpeg" alt="FCube Theater">
      <div class="theater-name">FCube Theater</div>
    </div>
    <div class="theater-image">
      <img src="bigmovies.jpeg" alt="Big Movies Theater">
      <div class="theater-name">Big Movies Theater</div>
    </div>
    <div class="theater-image">
      <img src="qfx.svg" alt="QFX Theater">
      <div class="theater-name">QFX Theater</div>
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
</body>

</html>
