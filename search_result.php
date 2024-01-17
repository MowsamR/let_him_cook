<!DOCTYPE html>
<html lang = "en">
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
        <?php
            // When the user presses the submit button 
            if (isset($_POST['Dish'])) {
                // Variables to store user input
                $Dish = $_POST['Dish'];
                
                //SQL query to covert Name into the ID number
                $parse = $conn->prepare("SELECT dishes.DishesId FROM dishes WHERE dishes.Name  = ? ");
                $parse->bind_param("s",$Dish);
                $parse->execute();
                $conv = $parse->get_result();
                while($row = $conv->fetch_assoc()){
                    $id =  $row['DishesId']."<br> \n";
                }
                
                // Used for the SQL query above. HOW? - prepared statements?
                $stmt = $conn->prepare("SELECT * FROM ingredients INNER JOIN ingredients_dishes ON ingredients.IngredientID = ingredients_dishes.IngredientID WHERE ingredients_dishes.DishID = ?");
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
                $parse = $conn->prepare("SELECT ingredients.IngredientID FROM ingredients WHERE ingredients.Name = ? ");
                $parse->bind_param("s",$Ingredient);
                $parse->execute();
                $conv = $parse->get_result();
        
                while($row = $conv->fetch_assoc()){
                    $id =  $row['IngredientID']."<br> \n";
                }
                
                // Used for the SQL query above. HOW? - prepared statements?
                $ingSearch = $conn->prepare("SELECT * FROM dishes INNER JOIN ingredients_dishes ON dishes.DishesId = ingredients_dishes.DishID WHERE ingredients_dishes.IngredientID = ?");
                $ingSearch->bind_param("i",$id);
                $ingSearch->execute();
                $ans = $ingSearch->get_result();

                $number_of_rows = $ans->num_rows;
                if($number_of_rows > 0){
                    echo "<h2 class='search-result-heading ms-3'> Search results for '" .  $Ingredient. "'</h2>";
                    // Output results of the SQL query (Pancakes and Cookies)
                    echo "<div class='search-cards-container'>";
                    while($data = $ans->fetch_assoc()){
                        //echo $data['Name']."<br> \n";
                        /* 
                        echo "<div class='col-6'>
                                <h3 class='search-result-heading mb-0'>" . $data['Name'] . "</h3>
                                <p class='ml-2'>" . "Takes " . $data['Duration'] . " and serves " . "" . "</p>
                            </div>";
                        */
            ?>
                    <div class='row justify-content-evenly'>
                        <div class='col-10'>
                            <div class='card search-card-style mb-3'>
                                
                                <div class='row g-0'>
                                    <div class='col-12 col-md-5 col-lg-3 col-xl-3 col-xxl-3'>
                                        <img src='img/<?php echo $data['Name']?>.jpg' class='card-img search-card-img img-fluid rounded-start' alt='first image'/>
                                    </div>
                                    <div class='col-12 col-md-5 col-lg-9 col-xl-9 col-xxl-9'>
                                        <div class='card-body mb-auto d-flex flex-column'>
                                            <div class='h-100'>
                                                <p class='card-text mb-0'><i class="bi bi-people-fill"></i> Serves</p>
                                                <h2 class='card-title mb-0'><?php echo $data['Name'] ?></h2>
                                                <p class='card-text ms-1 mt-0'>Short description</p>
                                                <h4 class='card-title  mb-3'><i class="bi bi-clock"></i> <strong><?php echo $data['Duration'] ?></strong></h4>
                                            </div>
                                            <div class='d-flex mt-auto ms-auto'>
                                                <button class='btn btn-login mt-auto' type='button'>Open recipe</button>
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
                }else{
                    echo "<h1 class='search-result-heading'>No results found</h1>";
                }
            }
        ?>
    
        <!--
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
	
</html>