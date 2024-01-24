
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Inventory </title>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Inventory </title>

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

		//SQL statement to get user's inventory
		$showInv = $conn->prepare("SELECT i.Name AS IngredientName, inv.Quantity AS QuantityInInventory FROM user u JOIN inventory inv ON u.UserID = inv.InventoryID JOIN ingredients i ON inv.IngredientID = i.IngredientID WHERE u.Username = ?");
		$showInv->bind_param("s",$username);
		$showInv->execute();
		$showInv->store_result();
		
		//Display the user's current inventory
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
				echo "<form method= 'post' action= 'Inventory.php' >
						<div class='d-flex justify-content-end mt-2 mb-3'>
							<input type='submit' name='Recommend' class='btn btn-login col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-5' value='Recommend'/> 	
						</div>
					</form>";
			echo "</div>";
		} 
		else {
			echo "<h1>No inventory data available.</h1>";
		}

		$showInv->free_result();
		$showInv->close();
		
		// Get UserID of current user

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
		
		<!-- <div class="col-3">
			<label for="ingredientDropdown " class="mb-3">Cuisine: </label>
			<select class="form-select filter-options" id="ingredientDropdown" name="ingredientDropdown" aria-label="ingredient dropdown">
				<option value="" class="value">Select ingredient</option>
				<?php 
					$ing_query = "SELECT IngredientID, ingredients.Name FROM ingredients";
					$result = $conn->query($ing_query);

					
					while($row = $result->fetch_assoc()){
						echo "<option value='". $IngredientID ."'> " . $row['Name'] . "</option>";
					}
				?>
			</select>
		</div> -->
	<?php
		if(isset($_POST['Recommend'])) { 	 
			$ID = $_SESSION["id"];
			$sugguest = $conn->prepare("SELECT DISTINCT d.Name AS DishName FROM dishes d JOIN ingredients_dishes id ON d.DishesId = id.DishID JOIN ingredients i ON id.IngredientID = i.IngredientID JOIN inventory ii ON i.IngredientID = ii.IngredientID WHERE ii.InventoryID = ?");
			$sugguest->bind_param("i",$ID);
			$sugguest->execute();
			$sugguest->store_result();
			
			echo "<div class='container col-10 col-lg-8 col-xl-6 col-xxl-6'>";
			echo '<table class="table py-2 px-2">';
				echo "<thead>
						<tr>
							<th class='col'>Dish Name</th>
						</tr>
					</thead>";
				echo "<tbody>";
					$sugguest->bind_result($dishname);
					while ($sugguest->fetch()) {
						echo"
						<tr>
							<th scope='row'> " . $dishname . "</th>
							<td> <input type='submit' name='$dishname' value='Cook me!'> </td>
						</tr>";
						
					}
				echo "</tbody>";
			echo "</table>";
			echo "</div>";
		} 	
		$conn->close();
	?>
	
</body>
</html>