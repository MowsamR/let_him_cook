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

<body>
    <?php include 'php_scripts/db_connection.php'; ?>
    <?php include 'nav.php'; ?>

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
        } else {
            echo "SQl Query ERROR";
        }
    }

    ?>



    <div class="container">
        <hr class="black-divider">
        <h1 class="text-center"><?php echo $dishName ?></h1>
        <hr class="black-divider">

        <div class="row mt-5">
            <div class="col-8">
                <img class="dish-image" src="img/Cookies.jpg" alt="Cookies">
            </div>
            <div class="col-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur tenetur nobis assumenda corrupti aperiam voluptas ipsam fuga maiores ipsa totam.</p>
            </div>
        </div>


    </div>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>