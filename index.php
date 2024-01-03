<?php
session_start();
if (isset($_SESSION["id"])) {
  $username = $_SESSION["username"];
  $loggedin = true;
} else {
  $loggedin = false;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
		<link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Poppins&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,500;1,9..40,500&family=Poppins&display=swap" rel="stylesheet">
  
  </head>
    <body>

        <?php include 'nav.php';?>
        <div id="homepage-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators d-flex flex-row justify-content-center">
            <li data-target="#homepage-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#homepage-carousel" data-slide-to="1"></li>
            <li data-target="#homepage-carousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="second.jpg" alt="first slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 " src="first.jpg" alt="second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="third.jpg" alt="third slide">
            </div>
            <a class="carousel-control-prev" href="#homepage-carousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#homepage-carousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <h1 class="index-heading">Most popular</h1>
        <div class="d-flex">

      <div class="col-1"></div>

      <div class="card card-style">
        <img src="first.jpg" class="card-img-top" alt="card 1">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="col-1"></div>
      <div class="card card-style">
        <img src="second.jpg" class="card-img-top" alt="card 2">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="col-1"></div>

      <div class="card card-style">
        <img src="third.jpg" class="card-img-top" alt="card 3">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="col-1"></div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>