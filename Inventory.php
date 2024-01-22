<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inventory</title>
	<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
</head>

<body>
<li><a href = "LandingPage.php"> Home </a></li>
<li><a href = "Register.php"> Login / Register </a></li>
<li><a href = "Search.php"> Search </a></li>
<h1>Inventory</h1>

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
	// SQL query to get the Inventory ID of a given user
	
	$query = "SELECT inventory.InventoryID FROM inventory WHERE inventory.UserID = ?;"
		
	if($result = $db_connection->query($query)){
	echo "<p>Returned rows are: " . $result -> num_rows . "</p>";
	echo "<br>";
	}
	// Output results of the SQL query (Eggs and Plain Flour)
	while($row = $result->fetch_assoc()){
			echo $row['Name']."<br> \n";
		}
	echo "<br>";
	
	// Check if the form fields are set
	if (isset($_POST["Ingredient"]) && isset($_POST["Quantity"])) {
		// Retrieve data from the form
		$Ingredient = $_POST["Ingredient"];
		$Quantity = $_POST["Quantity"];
		

		// Process the data (you can perform any validation or database operations here)
		// For simplicity, let's just display the received data
		echo "Ingredient: $Ingredient has been added <br>";
		
	} else {
		echo "Form fields not set.";
	}

?>



<div class = "col-4 login-form">
	<form method="post" action="Inventory.php">
		<label for="Ingredient">Ingredient:</label>
        <input type="text" name="Ingredient" required><br>

        <label for="Quantity">Quantity:</label>
        <input type="text" name="Quantity" required><br>

        <input type="submit" value="Submit">
    </form>
</div>
	