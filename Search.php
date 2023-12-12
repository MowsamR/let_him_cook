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
	$db_name = "LHCv0.2";
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
	//Test if Query results can be outputted
	$query = "SELECT * FROM ingredients INNER JOIN ingredients_dishes ON ingredients.IngredientID = ingredients_dishes.IngredientID WHERE ingredients_dishes.DishID = 1";
	
	//Number of rows returned from the query (2)
	if($result = $db_connection->query($query)){
	echo "<p>Returned rows are: " . $result -> num_rows . "</p>";
	echo "<br>";
	}
	// Output results of the SQL query (Eggs and Plain Flour)
	while($row = $result->fetch_assoc()){
			echo $row['Name']."<br> \n";
		}
	echo "<br>";
		
	// When the user presses the submit button 
	if (isset($_POST['Dish'])) {
		// Variables to store user input
		$Dish = $_POST['Dish'];
		
		//SQL query to covert Name into the ID number
		$parse = $db_connection->prepare("SELECT dishes.DishesId FROM dishes WHERE dishes.Name  = ? ");
		$parse->bind_param("s",$Dish);
		$parse->execute();
		$conv = $parse->get_result();
		while($row = $conv->fetch_assoc()){
			$id =  $row['DishesId']."<br> \n";
		}
		
		// Used for the SQL query above. HOW? - prepared statements?
		$stmt = $db_connection->prepare("SELECT * FROM ingredients INNER JOIN ingredients_dishes ON ingredients.IngredientID = ingredients_dishes.IngredientID WHERE ingredients_dishes.DishID = ?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$outocme = $stmt->get_result();
		
		// Output results of the SQL query (Eggs and Plain Flour)
		while($row = $outocme->fetch_assoc()){
			echo $row['Name']."<br> \n";
		}
	}
	
	// When the user presses the submit button 
	if (isset($_POST['Ingredient'])) {
		// Variables to store user input
		$Ingredient = $_POST['Ingredient'];
		
		//SQL query to covert Name into the ID number
		$parse = $db_connection->prepare("SELECT ingredients.IngredientID FROM ingredients WHERE ingredients.Name = ? ");
		$parse->bind_param("s",$Ingredient);
		$parse->execute();
		$conv = $parse->get_result();
		while($row = $conv->fetch_assoc()){
			$id =  $row['IngredientID']."<br> \n";
		}
		
		// Used for the SQL query above. HOW? - prepared statements?
		$ingSearch = $db_connection->prepare("SELECT * FROM dishes INNER JOIN ingredients_dishes ON dishes.DishesId = ingredients_dishes.DishID WHERE ingredients_dishes.IngredientID = ?");
		$ingSearch->bind_param("i",$id);
		$ingSearch->execute();
		$ans = $ingSearch->get_result();
		
		// Output results of the SQL query (Pancakes and Cookies)
		while($data = $ans->fetch_assoc()){
			echo $data['Name']."<br> \n";
			}	
	}


?>
<div class = "col-4 login-form">
<form action="Search.php" method="post">
	<div class = "form-group">
	<label for='Dish'>Dish:</label><br>
	<input type='text' id='Dish' name='Dish' placeholder='Input your Dish'><br>
	</div>
	<div class ="form-group">
	<input name= "Submit" type='submit' value='Submit'> 
	<br>
	<br>
	<label for="inventory"> inventory</label>
	<select id ="inventory" name= "inventory">
	<option value="Fridge">Fridge</option>
	<option value="Freezer">Freezer</option>
	<option value="Cuipboard">Cupboard</option>
	</select>
	</div>
	</form>

<br>
<div class = "col-4 login-form">
<form action="Search.php" method="post"> 
	<div class ="form-group">
	<label for='Ingredient'>Ingredients:</label><br>
	<input type='text' id='Ingredient' name='Ingredient' placeholder='Input your Ingredients'>
	</div>
	<br>
	<div class ="form-group">
	<input name="Submit" type='submit' value='Submit'>
	</div>
	</form>
</div>