
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
            <img class="d-block w-100" src="img/Cookies.jpg" alt="third slide">
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
        <h1 class="index-heading mt-2 ms-4">Most popular</h1>

      <div class="d-lg-flex justify-content-center">

        <div class="card index-card-style col-10 col-md-8 col-lg-3 mx-auto mt-4">
          <img src="img/Pancakes.jpg" class="card-img-top" alt="card 1">
          <p class='card-text mb-0 ms-2 mt-1'><i class="bi bi-people-fill"></i> Serves</p>
          <div class="card-body">
            <h4 class="card-title" mb-2 mt-0>Recipe name</h4>
            <p class="card-text ms-1">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <h6 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong>30 minutes</strong></h6>
            <div class="mx-auto">
              <a href="" class="btn index-card-btn ms-auto col-12">Open recipe</a>
            </div>
          </div>
        </div>
    
        <div class="card index-card-style col-10 col-md-8 col-lg-3 mx-auto mt-4">
          <img src="img/Pancakes.jpg" class="card-img-top" alt="card 2" >
          <p class='card-text mb-0 ms-2 mt-1'><i class="bi bi-people-fill"></i> Serves</p>
          <div class="card-body">
            <h4 class="card-title mb-2 mt-0">Recipe name</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <h6 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong>30 minutes</strong></h6>
            <div class="mx-auto">
              <a href="" class="btn index-card-btn ms-auto col-12">Open recipe</a>
            </div>
          </div>
        </div>

        <div class="card index-card-style col-10 col-md-8 col-lg-3 mx-auto mt-4">
          <img src="img/Pancakes.jpg" class="card-img-top" alt="card 3">
          <p class='card-text mb-0 ms-2 mt-1'><i class="bi bi-people-fill"></i> Serves</p>
          <div class="card-body">
            <h4 class="card-title mb-2 mt-0">Recipe name</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <h6 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong>30 minutes</strong></h6>
            <div class="mx-auto">
              <a href="" class="btn index-card-btn ms-auto col-12">Open recipe</a>
            </div>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>