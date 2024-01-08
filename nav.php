<?php
session_start();
if (isset($_SESSION["id"])) {
  $username = $_SESSION["username"];
  $loggedin = true;
} else {
  $loggedin = false;
}
?>

<nav class="navbar navbar-expand-sm">

    <a class="navbar-brand ms-3" href="index.php">LHC</a>
    <!-- Toggle Menu Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse lhc-nav d-flex" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Search Bar -->
        <li>
          <form class="form-inline d-flex me-3 w-100" action="search_result.php" method="POST">
            <div class="form-group">
              <input class="form-control navbar-search-input" type="search" id='searchFood' name='searchFood' aria-label="Search">
            </div>
            <button class="btn btn-dark navbar-search-btn ms-2" name="Submit" type="submit" required>Search</button>
          </form>
        </li>
        <li class="nav-item d-flex justify-content-end">
          <a class="nav-link dishes-link-nav" href="#">Dishes</a>
        </li>

        <!-- If user is logged in, show relevant previlaged actions (Check dashboard, inventory, logout, etc) -->
        <?php if ($loggedin == true) :?>
        <div class="vr"></div>
        <li class="nav-item justify-content-end dropdown mx-2">        
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle justify-content-end dropdown mx-2" type="button"data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo "{$username}";?>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="profile.php">Edit Profile</a>
              <a class="dropdown-item" href="#">Inventory</a>
              <a class="dropdown-item" href="php_scripts/logout.php">Log out</a>
            </div>
          </div>
        </li>
      
        <!-- If user isn't logged in, show log in and register button -->
        <?php else :?>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <?php endif;?>
        </ul>
      </ul>
    </div>
  
</nav>