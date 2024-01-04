<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>search</title>
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
<?php include 'php_scripts/db_connection.php'; ?>
<style>

</style>

<body>

  <?php include 'nav.php'; ?>

  <div class="container-fluid">
    <div class="row m-5 justify-content-center">
      <div class="w-70 input-group input-group-lg">
        <input type="text" class="form-control p-3" placeholder="Search Dishes, Ingredients..." aria-label="searchFood" aria-describedby="searchButton">
        <button class="btn btn-outline-secondary" type="button" id="searchButton">Search</button>
        <button class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" type="button">Filter</button>
      </div>
    </div>
    <div class="row">
      <!-- ========== Sidebar for Filter Options ========== -->
      <div class="collapse" id="collapseExample">
        <div class="card shadow filter-card-body">
          <div class="card-body ">
            <h3 class="card-title text-center">Filter Options</h3>
            <!-- ========== Change destination later ========== -->
            <form action="test.php" method="get">
              <!-- Cuisine Option: -->
              <label for="cuisineFilter" class="">Cuisine: </label>
              <select class="form-select filter-options" id="cuisineFilter" aria-label="Default select example">
                <option value="">Select Cuisine</option>
                <option value="Indian">Indian</option>
                <option value="Chinese">Chinese</option>
                <option value="Italian">Italian</option>
              </select>
              <!-- Preferences Option: -->
              <label for="preferences" class="">Preferences: </label>
              <select class="form-select filter-options" id="preferences" aria-label="Default select example">
                <option value="">Select Preferences</option>
                <option value="Vegan">Vegan</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Halal">Halal</option>
              </select>
              <!-- Serving Option: -->
              <label for="servingRange" class="form-label filter-options">Select Serving: </label>
              <input type="range" class="form-range filter-options" id="servingRange" min="1" max="8" value="4">
              <p>Serving: <span id="servingResult"></span></p>
              <script>
                var range = document.getElementById("servingRange");
                var output = document.getElementById("servingResult");
                output.innerHTML = range.value;

                range.oninput = function() {
                  output.innerHTML = this.value;
                }
              </script>
              <div class="d-flex justify-content-end gap-3">

                <button type="button" class="btn btn-success "> Apply Changes</button>
                <button type="button" class="btn btn-danger"> Reset</button>
              </div>
            </form>

          </div>



          <!--
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>