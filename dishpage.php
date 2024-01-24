<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dish Page</title>
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

<body>
    <?php include 'nav.php'; ?>
    <?php include 'php_scripts/db_connection.php'; ?>


    <?php
    // Get the information data about the particular dish
    if (isset($_GET['dishID'])) {
        $dishID = $_GET['dishID'];
        //Retrieve Dish Data with the same DishesID primary key
        $Squery = "SELECT * FROM dishes WHERE DishesId = ?";
        if ($statement = $conn->prepare($Squery)) {
            $statement->bind_param("s", $dishID);

            if ($statement->execute()) {
                $statement->store_result();
                if ($statement->num_rows() > 0) {

                    //bind the 'outputs' of the SQL command to these variables respectively and fill them via fetch()
                    $statement->bind_result($dishID, $dishName, $Duration, $Serves, $Cuisine);
                    $statement->fetch();
                }
            }

            //Retrieve dish description
            $DescriptionQuery = "SELECT DishDescription.Description FROM DishDescription WHERE DishesId = {$dishID}";
            $descriptionQueryResult = $conn->query($DescriptionQuery);

            if ($descriptionQueryResult > 0) {
                $row = $descriptionQueryResult->fetch_assoc();
                $DishDescription = $row['Description'];
            }
        } else {
            echo "SQl Query ERROR";
        }
    }

    ?>


    <div class="container">
        <hr class="black-divider mt-5">
        <h1 class="text-center"><?php echo $dishName ?></h1>
        <hr class="black-divider mb-5">

        <div class="row m-3 align-item-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 pb-md-4 mx-md-auto pb-sm-4 pb-4">
                <img class="dish-image img-fluid" src="img/Cookies.jpg" alt="Cookies">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 cooking-steps">

                <div class="row mb-4">
                    <h4 class="text-center m-4"><?php echo $dishName ?> Ingredients</h4>
                    <hr class="green-divider">
                    <?php
                    $IngredientsQuery = "SELECT IngDish.DishID, Ing.IngredientID, Ing.Name, IngDish.Quantity FROM `ingredients_dishes` AS IngDish INNER JOIN ingredients AS Ing ON Ing.IngredientID = IngDish.IngredientID WHERE IngDish.DishID = {$dishID}";

                    $IngredientsQueryResult = $conn->query($IngredientsQuery);

                    if ($IngredientsQueryResult > 0) { ?>
                        <ol class="px-5">
                            <?php
                            while ($data = $IngredientsQueryResult->fetch_assoc()) {
                                $Ingredient = $data['Name'];
                                $Quantity = $data['Quantity'];
                            ?>
                                <li class="mb-4"><?php echo $Ingredient ?></li>
                            <?php } ?>
                        </ol>
                    <?php } else {
                        echo "No Cooking Instructions Found";
                    }  ?>
                </div>

                <div class="row ">
                    <div class="dish-description col-12  mx-auto">
                        <h4 class="text-center m-4"><?php echo $dishName ?> Description</h4>
                        <hr class="green-divider">
                        <p class="fs-5 p-4"><?php echo $DishDescription; ?></p>
                    </div>
                </div>

            </div>


        </div>


        <hr class="black-divider mt-5">
        <h1 class="text-center">Cooking Direction</h1>
        <hr class="black-divider mb-5">

        <div class="row m-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6 cooking-steps">
                <h4 class="text-center m-4"><?php echo $dishName ?> Cooking Direction</h4>
                <hr class="green-divider">
                <?php
                $CookingStepsQuery = "SELECT CookingSteps.StepNumber, CookingSteps.Instruction FROM CookingSteps WHERE DishesId = {$dishID}";
                $CookingStepsQueryResult = $conn->query($CookingStepsQuery);

                if ($descriptionQueryResult > 0) { ?>
                    <ol class="px-5">
                        <?php
                        while ($data = $CookingStepsQueryResult->fetch_assoc()) {
                            $StepNumber = $data['StepNumber'];
                            $Instruction = $data['Instruction'];
                        ?>
                            <li class="mb-4"><?php echo $Instruction ?></li>
                        <?php } ?>
                    </ol>
                <?php } else {
                    echo "No Cooking Instructions Found";
                }  ?>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div>
                    <?php
                    $VideoSearchQuery = "SELECT URL FROM DishVideo WHERE DishId = {$dishID}";
                    $VideoSearchQueryResult = $conn->query($VideoSearchQuery);

                    if ($VideoSearchQueryResult > 0) {
                        $row = $VideoSearchQueryResult->fetch_assoc();
                        $url = explode('=',  $row['URL']);
                        $endURL = end($url);
                        $fullurl = "https://www.youtube.com/embed/" . $endURL;
                    } else {
                        echo "URL not Found";
                    }
                    $conn->close();
                    ?>
                    <iframe class="dish-video" src="<?php echo $fullurl;?>" allowfullscreen></iframe>
                </div>
            </div>

        </div>

    </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>