<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <li><a href="index.php"> Home </a></li>
    <li><a href="register.php"> Login / Register </a></li>
    <li><a href="search.php"> Search </a></li>
    <h1>Search</h1>
    <?php
    include 'db_connection.php';
    $query = "SELECT * FROM dishes INNER JOIN ingredients_dishes ON dishes.DishesId = ingredients_dishes.DishID WHERE ingredients_dishes.IngredientID = 1";
    if ($result = $db_connection->query($query)) {
        echo "<p>Returned rows are: " . $result->num_rows . "</p>";
        $row = $result->fetch_assoc();
        //echo '<tr><th>Dishes</th><th>Ingredients</th></tr>';
        echo "<br>";
        echo "<tr>" .
            "<td>" . $row["Name"] . "</td>" .
            "</tr>";
    }
    ?>

    <form action="../PHP/search.php" method="post">
        <label for='Dish'>Dish:</label><br>
        <input type='text' id='Dish' name='Dish' placeholder='Input your Dish'><br>
        <label for='Ingredient'>Ingredients:</label><br>
        <input type='text' id='Ingredient' name='Ingredient' placeholder='Input your Ingredients'>
        <br>
        <input type='submit' value='Submit'>
    </form>

</body>

</html>