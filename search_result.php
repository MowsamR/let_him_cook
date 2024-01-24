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


<body>

    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row m-5 justify-content-center mb-0">
            <!-- ========== Search Box ========== -->
            <form class="w-70 input-group input-group-lg" action="search_result.php" method="post">
                <input type="text" class="form-control p-3" placeholder="Search Dishes, Ingredients..." aria-label="searchFood" aria-describedby="searchFood" id="searchFood" name="searchFood">
                <button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
                <button class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter" type="button">Filter</button>
            </form>
        </div>
        <div class="row col-10 mx-auto">
            <!-- ========== Collapsable Filter Options Section ========== -->
            <div class="collapse" id="collapseFilter">
                <div class="card shadow filter-card-body">
                    <div class="card-body px-5 ">
                        <h3 class="card-title text-center">Filter Options</h3>
                        <hr class="green-divider">
                        <!-- ========== Change destination later ========== -->
                        <!-- ========== Filter Form ========== -->
                        <form action="search_result.php" method="GET">
                            <!-- Cuisine Option: -->
                            <div class="row">
                                <div class="col-6">
                                    <label for="cuisineFilter " class="mb-3">Cuisine: </label>
                                    <select class="form-select filter-options" id="cuisineFilter" name="cuisineFilter" aria-label="cuisine filter option">
                                        <option value="">Select Cuisine</option>
                                        <option value="Indian">Indian</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Italian">Italian</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <!-- Preferences Option: -->
                                    <label for="preferences" class="mb-3">Preferences: </label>
                                    <select class="form-select filter-options" id="preferences" name="preferences" aria-label="preferences filter option">
                                        <option value="">Select Preferences</option>
                                        <option value="Vegan">Vegan</option>
                                        <option value="Vegetarian">Vegetarian</option>
                                        <option value="Halal">Halal</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Serving Option: -->
                            <label for="servingRange" class="form-label filter-options ">Select Serving: </label>
                            <input type="range" class="form-range filter-options" id="servingRange" name="servingRange" min="1" max="8" value="1">
                            <p>Serving: <span id="servingResult"></span> or less</p>

                            <!-- Script for showing serving option chosen  -->
                            <script>
                                var range = document.getElementById("servingRange");
                                var output = document.getElementById("servingResult");
                                output.innerHTML = range.value;

                                range.oninput = function() {
                                    output.innerHTML = this.value;
                                }
                            </script>
                            <!-- Apply/Reset Buttons -->
                            <div class="d-flex justify-content-end gap-3">
                                <button type="submit" class="btn btn-success" name="applyChanges"> Apply Changes</button>
                                <button type="submit" class="btn btn-danger" name="reset"> Reset</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== Logic Conditionals for Filter box section ========== -->
    <?php
    include "php_scripts/db_connection.php";
    //if user clicks on Apply changes button in filter section, only then run the below instructions
    if (isset($_GET['applyChanges'])) {
        if (isset($_GET['cuisineFilter'])) {
            $selectedCuisineOption = $_GET['cuisineFilter'];
        }
        if (isset($_GET['preferences'])) {
            $selectedPreferencesOption = $_GET['preferences'];
        }
        if (isset($_GET['servingRange'])) {
            $selectedServingRange = $_GET['servingRange'];
        }
        //main SQL query
        $filterQuery = "SELECT * FROM dishes WHERE 1=1";
        //
        if (!empty($selectedCuisineOption)) {
            //append this to main SQL query
            $filterQuery .= " AND Cuisine = '{$selectedCuisineOption}'";
        }
        if (!empty($selectedPreferencesOption)) {
            //append this to main SQL query
            $filterQuery .= " AND Preferences = '{$selectedPreferencesOption}'";
        }
        if (!empty($selectedServingRange)) {
            //append this to main SQL query
            $filterQuery .= " AND Serves <= '{$selectedServingRange}'";
        }
        // Sort by serves decending order
        $filterQuery .= " ORDER BY Serves DESC";

        //NOTE: Prepared statements not required in filter section. Because users click rather than type, Hence, SQL injection is not possible.
        //Therefore, used normal query() rather than execute() and get_result()
        if ($ans = $conn->query($filterQuery)) {
        } else {
            echo "Failed SQL Query Connection.";
        }
    }
    ?>

    <!-- ========== PHP code for searching dishes based on dishes name input and ingredient name input ========== -->
    <?php
    if (isset($_POST['searchFood'])) {
        // Variables to store user input
        $searchFood = $_POST['searchFood'];

        //Search query for Getting dish info from dish name
        $dishQuery = "SELECT * FROM dishes WHERE dishes.Name LIKE ?";

        $DishSearch = $conn->prepare($dishQuery);
        $DishFoodInputSearch = "%" . $searchFood . "%";
        $DishSearch->bind_param("s", $DishFoodInputSearch);
        $DishSearch->execute();
        $dishQueryResult = $DishSearch->get_result();

        // if no dishes is found that matches the input , check if the input matches ingredient
        if ($dishQueryResult->num_rows < 1) {
            //Search query for Getting ingredient ID from ingredient name
            $ingredientQuery = "SELECT ingredients.IngredientID, ingredients.Name FROM ingredients WHERE ingredients.Name LIKE ? ";

            $parse = $conn->prepare($ingredientQuery);
            $IngredientFoodInputSearch = "%" . $searchFood . "%";
            $parse->bind_param("s", $IngredientFoodInputSearch);
            $parse->execute();
            $conv = $parse->get_result();

            while ($row = $conv->fetch_assoc()) {
                $id =  $row['IngredientID'] . "<br> \n";
                $ingredientName =  $row['Name'];
            }

            // Get dishes from the ingredient id
            $ingSearch = $conn->prepare("SELECT * FROM dishes INNER JOIN ingredients_dishes ON dishes.DishesId = ingredients_dishes.DishID WHERE ingredients_dishes.IngredientID = ?");
            $ingSearch->bind_param("i", $id);
            $ingSearch->execute();
            $ans = $ingSearch->get_result();
        } else {
            $ans = $dishQueryResult;
        }
    }

    ?>

    <!-- ========== PHP code for Displaying results ========== -->
    <?php
    $number_of_rows = $ans->num_rows;
    if ($number_of_rows > 0) { ?>

        <div class='container'>
            <div class="row m-5">
                <h2 class='search-result-heading col-6 text-start '> Search results for ' <?php echo $searchFood; ?> '</h2>
                <h2 class='search-result-heading col-6 text-end'><?php echo $number_of_rows; ?> Dishes </h2>
            </div>

            <?php
            // Output results of the SQL query (Pancakes and Cookies)
            while ($data = $ans->fetch_assoc()) {
                //echo $data['Name']."<br> \n";
                /* 
                        echo "<div class='col-6'>
                                <h3 class='search-result-heading mb-0'>" . $data['Name'] . "</h3>
                                <p class='ml-2'>" . "Takes " . $data['Duration'] . " and serves " . "" . "</p>
                            </div>";
                        */
            ?>

                <div class='row g-5 justify-content-evenly'>
                    <div class='col-10'>
                        <div class='card search-card-style mb-3'>
                            <div class='row g-0'>
                                <div class='col-12 col-md-5 col-lg-3 col-xl-3 col-xxl-3'>
                                    <img src='img/<?php echo $data['Name'] ?>.jpg' class='card-img search-card-img img-fluid rounded-start' alt='first image' />
                                </div>

                                <div class='col-12 col-md-5 col-lg-9 col-xl-9 col-xxl-9'>
                                    <div class='card-body mb-auto d-flex flex-column'>
                                        <div class='h-100'>
                                            <p class='card-text mb-0'><i class="bi bi-people-fill"></i> Serves <?php echo $data['Serves'] ?> </p>
                                            <h2 class='card-title mb-0'><?php echo $data['Name'] ?></h2>
                                            <p class='card-text ms-1 mt-0'>Lorem ipsum dolor sit amet consectetur adipisicing elit. In, natus obcaecati? Numquam corrupti pariatur veniam? Earum ab aperiam dicta maxime./p>
                                            <h4 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong><?php echo $data['Duration'] ?></strong></h4>
                                        </div>
                                        <div class='d-flex mt-auto flex-row-reverse'>
                                            <a href="dishpage.php?dishID=<?php echo $data['DishesId']; ?>
                                        " class='btn btn-dark mt-auto' type='button'>Open recipe</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



        <?php
            }
            echo "</div>";
        } else {
            echo "<h1 class='search-result-heading'>No results found</h1>";
        }
        $conn->close();
        ?>

        <!--
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>