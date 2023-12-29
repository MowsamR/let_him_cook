<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>search</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Poppins&display=swap" rel="stylesheet">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,500;1,9..40,500&family=Poppins&display=swap" rel="stylesheet">
	
	</head>

	<body>

		<nav class="navbar navbar-expand-sm">
			<a class="navbar-brand">LHC</a>
			<div class="d-flex lhc-nav" id="navbarSupportedContent">
				<ul class="navbar-nav">
				<li>
					<form class="form-inline">
					<input class="form-control" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				</li>
				<li class="nav-item d-flex justify-content-end">
					<a class="nav-link dishes-link-nav" href="#">Dishes</a>
				</li>
				<li class="nav-item d-flex justify-content-end dropdown">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo $username ?>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Dashboard</a>
					<a class="dropdown-item" href="#">Inventory</a>
					<a class="dropdown-item" href="#">Logout</a>
					</div>
				</div>
				</li>
				</ul>
			</div>
		</nav>

		<div class = "col-4 login-form"> 
			<form action="search_result.php" method="post">
				<div class = "form-group">
				<!--
				<label for='Dish'>Dish:</label><br>
				<input class="form-control" type='text' id='Dish' name='Dish' placeholder='Input your Dish'><br>
				-->
				
				<label for='Ingredient'>Ingredients:</label><br>
				<input class="form-control" type='text' id='Ingredient' name='Ingredient' placeholder='Input your Ingredients'>
				
				</div>
				<div class="d-flex justify-content-end">
					<button name="Submit" type="submit" class="btn col-4 btn-login">Search</button>
				</div>
			</form>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>