<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Inventory </title>
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

	<?php include 'nav.php'; ?>

	<h1 class = "ms-5">Inventory </h1>
	<?php 
		
		include "php_scripts/db_connection.php";
		
		$username = $_SESSION["username"];
		$invParam = "";

		//Display the user's current inventory
		$showInv = $conn->prepare("SELECT i.Name AS IngredientName, ii.Quantity AS QuantityInInventory FROM user u JOIN inventory inv ON u.UserID = inv.UserID JOIN inventory_ingredients ii ON inv.InventoryID = ii.InventoryID JOIN ingredients i ON ii.IngredientID = i.IngredientID WHERE u.Username = ?");
		$showInv->bind_param("s",$username);
		$showInv->execute();
		$showInv->store_result();
		
		if ($showInv -> num_rows > 0){
			echo "<div class='container col-10 col-lg-8 col-xl-6 col-xxl-6'>";
			echo '<table class="table py-2 px-2">';
				echo "<thead>
						<tr>
							<th class='col'>Ingredient</th>
							<th class='col'>Quantity</th>
						</tr>
					</thead>";
				echo "<tbody>";
					$showInv->bind_result($ingredientName, $quantityInInventory);
					while ($showInv->fetch()) {
						echo"
						<tr>
							<th scope='row'> " . $ingredientName . "</th>
							<td>" . $quantityInInventory . "</td>

						</tr>";
					}
				echo "</tbody>";
			echo "</table>";
				echo "<form>
						<div class='d-flex justify-content-end mt-2 mb-3'>
							<input type='button' name='Recommend' class='btn btn-login col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-5' value='Recommend'/> 	
						</div>
					</form>";
			echo "</div>";
		} 
		else {
			echo "<p>No inventory data available.</p>";
		}

		$showInv->free_result();
		
		// Get UserID of current user
		$currentID = $conn->prepare("SELECT user.UserID FROM user WHERE user.Username = ?");
		$currentID->bind_param("s",$username);
		$currentID->execute();
		if ($currentID->error){	
			echo "There was an error with the getting the ID ";
		}
		$result = $currentID->get_result();
		if ($result->num_rows > 0) {
		$id = $result->fetch_assoc()['UserID'];
		} 
		else {
		// Handle the case where no data is returned
		echo "No user found with the given username.";
		}
		
		// Check if the form fields are set
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Ingredient"]) && isset($_POST["Quantity"])){

			// Retrieve data from the form
			$Ingredient = $_POST["Ingredient"];
			$Quantity = $_POST["Quantity"];
			
			//Get IngredientID of Ingredient
			$ingID = $conn->prepare("SELECT ingredients.IngredientID FROM ingredients WHERE ingredients.Name = ?;");
			$ingID->bind_param("s",$Ingredient);
			$ingID->execute();
			$equals = $ingID->get_result();
			$ingParam = $equals->fetch_assoc();
			
			// Verify Ingredient exists 
			if ($ingParam){
				//Get the Inventory ID of a given user		
				$stmt = $conn->prepare("SELECT inventory.InventoryID FROM inventory WHERE inventory.UserID = ?;");
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$outocme = $stmt->get_result();
				$invParam = $outocme->fetch_assoc();
				
				// Verify Inventory ID exists
				if ($invParam){
					//Add Ingredient to user's Inventory
					$addIng = $conn->prepare("INSERT INTO inventory_ingredients (inventory_ingredients.InventoryID, inventory_ingredients.IngredientID, inventory_ingredients.Quantity) VALUES (?,?,?);");
					$addIng->bind_param("iii",$invParam["InventoryID"],$ingParam["IngredientID"],$Quantity);
					$addIng->execute();
					echo "Ingredient: $Ingredient has been added <br>";
				}else{
					echo "No Inventory exists for this user";
				}
			
			}else{
				echo "Ingredient not found";
			}
		} 
		?>

		<div class="d-flex justify-content-center">
			<div class="col-11 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto py-2 px-2">
				<form method="post" action="Inventory.php">
						<div class = "form-group">
							<label for="Ingredient" class="login-register-labels">Ingredient:</label>
							<input type="text" name="Ingredient" class=" form-control login-register-input" required>
						</div>
						<div class = "form-group">
							<label for="Quantity" class="login-register-labels mt-2">Quantity:</label>
							<input type="text" name="Quantity" class = "form-control login-register-input" required>
						</div>
						<div class="d-flex justify-content-end mt-3 mb-3">
							<input type="submit" class="btn btn-login col-12 col-sm-4 col-md-4 col-lg-4 col-xl-3 col-xxl-3" value="Add">	
						</div>
				</form>
			</div>			
		</div>
		
		<?php
		if(isset($_POST['Recommend'])) { 	 
			global $conn, $invParam;
			echo "Button clicked";
			// Recommend dishes that use only ingrediens in the user's inventory
			$sugguest = $conn->prepare("SELECT DISTINCT d.Name AS DishName FROM dishes d JOIN ingredients_dishes id ON d.DishesId = id.DishID JOIN ingredients i ON id.IngredientID = i.IngredientID JOIN inventory_ingredients ii ON i.IngredientID = ii.IngredientID WHERE ii.InventoryID = ?");
			$sugguest->bind_param("s",$invParam);
			$sugguest->execute();
			$sugguest->store_result();
			$reccomendation = $sugguest->get_result();
		
			if ($recommendation -> num_rows > 0){
				echo '<table class="table">';
				echo "You have the ingredients to make the following dishes:";
				echo "<tr><th>Dishes</th>";
				while ($row = $result->fetch_assoc()) {
				echo "<tr><td>{$row['DishName']}</td></tr>";
			}
			echo "</table>";
			}
			else{
				echo "No available dishes";
			}
		} 
		
		$conn->close();


	?>
	
</body>
</html>


	