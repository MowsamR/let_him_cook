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
    <title>Let Him Cook</title>
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
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homepage-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homepage-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homepage-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/Cookies.jpg" alt="first slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 " src="img/Pancakes.jpg" alt="second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/Tandoori-chicken.jpg" alt="third slide">
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#homepage-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#homepage-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        </div>

      <div class="d-lg-flex justify-content-center mb-4">
        <div class="card index-card-style col-10 col-md-8 col-lg-3 mx-auto mt-4">
          <img src="img/Butter-Chicken.jpg" class="card-img-top" alt="card 1">
          <p class='card-text mb-0 ms-2 mt-1'><i class="bi bi-people-fill"></i> Serves 4</p>
          <div class="card-body">
            <h4 class="card-title" mb-2 mt-0>Butter Chicken</h4>
            <p class="card-text ms-1">Fancy a healthy version of your favourite Friday night curry? Try our easy butter chicken – the meat can be marinaded the day before so you can get ahead on your prep</p>
            <h6 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong>1 hour & 30 minutes</strong></h6>
            <div class="mx-auto mb-auto">
              <a href="dishpage.php?dishID=4" class="btn index-card-btn ms-auto col-12">Open recipe</a>
            </div>
          </div>
        </div>
    
        <div class="card index-card-style col-10 col-md-8 col-lg-3 mx-auto mt-4">
          <img src="img/Cookies.jpg" class="card-img-top" alt="card 2" >
          <p class='card-text mb-0 ms-2 mt-1'><i class="bi bi-people-fill"></i> Serves 5</p>
          <div class="card-body">
            <h4 class="card-title mb-2 mt-0">Cookies</h4>
            <p class="card-text">A favorite for all the peanut butter lovers, these cookies are made with hand-rolled dough that is often flattened with a fork to achieve that familiar waffle pattern. There is nothing like a peanut butter cookie to satisfy your sweet tooth and lift your spirits. This peanut butter cookie recipe will quickly become a family favorite.</p>
            <h6 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong>1 hour</strong></h6>
            <div class="mx-auto">
              <a href="dishpage.php?dishID=2" class="btn index-card-btn ms-auto col-12">Open recipe</a>
            </div>
          </div>
        </div>

        <div class="card index-card-style col-10 col-md-8 col-lg-3 mx-auto mt-4">
          <img src="img/Pancakes.jpg" class="card-img-top" alt="card 3">
          <p class='card-text mb-0 ms-2 mt-1'><i class="bi bi-people-fill"></i> Serves 4</p>
          <div class="card-body">
            <h4 class="card-title mb-2 mt-0">Pancakes</h4>
            <p class="card-text">You’ll never reach for a box of pancake mix again after making this easy pancake recipe from scratch. Requiring only a handful of pantry staples and 20 minutes of your time, these homemade pancakes are as simple, fluffy, and delicious as breakfast recipes get..</p>
            <h6 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong>30 minutes</strong></h6>
            <div class="mx-auto">
              <a href="dishpage.php?dishID=1" class="btn index-card-btn ms-auto col-12">40 minutes</a>
            </div>
          </div>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>