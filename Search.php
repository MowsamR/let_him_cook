<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search</title>
	<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity=
"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<li><a href = "LandingPage.php"> Home </a></li>
<li><a href = "Register.php"> Login / Register </a></li>
<li><a href = "Search.php"> Search </a></li>
<h1>Search</h1>
<?php
	$hostname = "localhost";
	$db_name = "let_him_cook";
	$username = "root";
	$password = "";
	$port = 3306;
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try{
	    $db_connection = new mysqli($hostname, $username, $password, $db_name, $port);
	    $charset  = 'utf8mb4';
	    $db_connection->set_charset($charset);
	} catch (\mysqli_sql_exception $e){
	    echo "An exception occurred when trying to connect to the database";
	    throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
	}
	unset($hostname, $db_name, $username, $password, $charset, $port); 
	if ($db_connection -> connect_errno){
	    echo "Failed to connect to a valid MySQL Database " . $db_connection -> connect_err;
	    exit();
	}
?>

<?php
	$query = "SELECT * FROM dishes INNER JOIN ingredients_dishes ON dishes.DishesId = ingredients_dishes.DishID WHERE ingredients_dishes.IngredientID = 1";
	if($result = $db_connection->query($query)){
	echo "<p>Returned rows are: " . $result -> num_rows . "</p>";
	$row = $result->fetch_assoc();
	//echo '<tr><th>Dishes</th><th>Ingredients</th></tr>';
	echo "<br>";
	echo $row["Name"];
	}
	if (isset($_POST['Dish'])) {
		// Variables to store data from form 
		$Dish = $_POST["Dish"];
		$Ingredient = $_POST["Ingredient"]; 
		echo $Dish;
		echo $Ingredient;
		//Check if Username or Email already exists in the system
       // $search = "SELECT * FROM ingredients INNER JOIN ingredients_dishes ON ingredients.IngredientID = ingredients_dishes.IngredientID WHERE ingredients_dishes.DishID = 1";
	//	$outcome = $db_connection->query($search)
		//while($row = $outcome->fetch_assoc()){
			//echo $row['ingredient']."br />\n"; 
	}
	
	
	

?>
	
<form action="Search.php" method="post"> 
	<label for='Dish'>Dish:</label><br>
	<input type='text' id='Dish' name='Dish' placeholder='Input your Dish'><br>
	<input name= "Dish" type='submit' value='Submit'> 
	<br>
	<br>
	<label for='Ingredient'>Ingredients:</label><br>
	<input type='text' id='Ingredient' name='Ingredient' placeholder='Input your Ingredients'>
	<br>
	<input name="Ingredient" type='submit' value='Submit'>
	<br>
	<label for="inventory"> inventory</label>
	<select id ="inventory" name= "inventory">
	<option value="Fridge">Fridge</option>
	<option value="Freezer">Freezer</option>
	<option value="Cuipboard">Cupboard</option>
	</select>
	</form>