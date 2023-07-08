<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Ticket Selling Website</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom CSS -->
  <style>
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
      position: absolute;
      bottom: 0;
    }

    .footer p {
      margin-bottom: 0;
    }

    .col-md-6 img {
      max-width: 70%;
    }
  </style>
</head>

<body>
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
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="movies.php">Movies</a>
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

  <div class="container mt-5">
    <h1>Coming Soon</h1>
    <div class="row">
      <div class="col-md-6">
        <img src="oppenheimer.jpg" alt="Movie Poster" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h3>Oppenheimer</h3>
        <p>A feature documentary exploring how one man's brilliance, hubris and relentless drive changed the nature of war forever, led to the deaths of hundreds of thousands of people and unleashed mass hysteria, and how, subsequently, the same man's attempts to co.</p>
        <p>Director: Christopher Nolan</p>
        <p>Cast: Cillian Murphy, Robert Downey Jr, Florence Pugh, Matt Damon</p>
        <p>Genre: War, History, Thriller, Drama, Mystery</p>
        <p>Runtime: 3 hours 9 seconds </p>
      </div>
    </div>
  </div>

  <footer class="footer">
    <p>&copy; 2023 PG CINEMAS. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
