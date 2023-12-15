<?php
      session_start();
      if (isset($_SESSION["id"])) {
        $username = $_SESSION["username"];
      }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Poppins&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,500;1,9..40,500&family=Poppins&display=swap" rel="stylesheet">
  
  </head>
    <body>

      <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand">LHC</a>
        <div class="d-flex lhc-nav" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li>
              <form class="form-inline">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </li>
            <li class="nav-item d-flex justify-content-end">
              <a class="nav-link dishes-link-nav" href="#">Dishes</a>
            </li>
            <li class="nav-item d-flex justify-content-end dropdown">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $username ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Dashboard</a>
                <a class="dropdown-item" href="#">Inventory</a>
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </div>
            </li>
          </ul>
        </div>
      </nav>
      
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

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>