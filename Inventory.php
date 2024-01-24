<?php
session_start();
if (isset($_SESSION["id"])) {
  $username = $_SESSION["username"];
  $loggedin = true;
} else {
  $loggedin = false;
}
?>
<?php
	include "php_scripts/db_connection.php";
	
	$id = $_SESSION["id"];
	
	// Check if the form fields are set
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Ingredient"]) && isset($_POST["Quantity"])){

		// Retrieve data from the form
		$Ingredient = $_POST["Ingredient"];
		$Quantity = (int)$_POST["Quantity"];
		
	
		//Get IngredientID of Ingredient
		$ingID = $conn->prepare("SELECT ingredients.IngredientID FROM ingredients WHERE ingredients.Name = ?;");
		$ingID->bind_param("s",$Ingredient);
		$ingID->execute();
		$ingID->bind_result($IngredientID);
		$ingID->fetch();
		$ingID->close();
		// Verify if the Ingredient is already in the user's Inventory
		//Count the number of times the Ingredient is present in the user's inventory (1 or 0) 
		$duplicate = $conn->prepare("SELECT COUNT(*) FROM inventory WHERE inventory.InventoryID = ? AND inventory.IngredientID = ?;");
		$duplicate->bind_param("ii",$id ,$IngredientID);
		$duplicate->execute();
		$duplicate->bind_result($count);
		$duplicate->fetch();
		$duplicate->close();
		
		// Verify Ingredient exists 
		if ($IngredientID){
			if ($count == 0){

				//Add Ingredient to user's Inventory
				$addIng = $conn->prepare("INSERT INTO inventory (inventory.InventoryID, inventory.IngredientID, inventory.Quantity) VALUES (?,?,?);");
				$addIng->bind_param("iii",$_SESSION["id"],$IngredientID ,$Quantity);
				if($addIng->execute()){
					header('Location: inventory_confirmation.php');
					$addIng->close();
					exit();
				}
					
				
				
			}
			
			else {
				$currentQuant = $conn->prepare("SELECT inventory.Quantity FROM inventory WHERE inventory.InventoryID = ? AND inventory.IngredientID = ?;");
				$currentQuant->bind_param("ii",$_SESSION["id"],$IngredientID);
				$currentQuant->execute();
				$currentQuant->bind_result($currentTotal);
				$currentQuant->fetch();
				$currentQuant->close();
				
				$newQuant = $Quantity + $currentTotal;
				
				$updateIng = $conn->prepare("UPDATE inventory SET Quantity = ? WHERE inventory.InventoryID = ? AND inventory.IngredientID = ?;");
				$updateIng->bind_param("iii",$newQuant,$_SESSION["id"],$IngredientID);
				if($updateIng->execute()){
					header('Location: inventory_confirmation.php');
					$updateIng->close();
					exit();
				}
				
				
			} 
			$stmt->close(); 
		} else{
			echo"<script language='javascript'>
					alert('Ingredient not found');
				</script>";
		}

		$ingID->close();
	}
	$conn->close();
	?>
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
							</tr>";
							
						}
					echo "</tbody>";
				echo "</table>";
				echo "</div>";
			} 	
			$conn->close();
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>
</html>