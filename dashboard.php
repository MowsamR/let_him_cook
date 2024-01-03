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
          <!--
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          -->
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

		<nav class="navbar navbar-expand-md">
			<a class="navbar-brand ms-3" href="index.php">LHC</a>
			<div class="lhc-nav d-flex" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto">
          <li class="nav-item ">
              <form class="form-inline d-flex me-4" action="search_result.php" method="post">
                  <div class="form-group">
                      <input class="form-control navbar-search-input" type="search" id='Ingredient' name='Ingredient' aria-label="Search">
                  </div>
                  <button name="Submit" class="btn btn-dark navbar-search-btn ms-2" type="submit">Search</button>
              </form>
          </li>
          <li class="nav-item">
              <a class="nav-link dishes-link-nav" href="#">Dishes</a>
          </li>
          <li class="nav-item justify-content-end dropdown mx-2">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Username
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

        <form>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>