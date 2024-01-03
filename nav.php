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
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">LHC</a>
    <!-- Toggle Menu Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <!-- Search Bar -->
        <li class="nav-item">
          <form class="form-inline" action="Search.php" method="POST">
            <input class="form-control" name="searchItem" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-success" name="submitSearch" type="submit" required>Search</button>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link dishes-link-nav" href="#">Dishes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link dishes-link-nav" href="#">Inventory</a>
        </li>
      </ul>

      <!-- If user is logged in, show relevant previlaged actions (Check dashboard, inventory, logout, etc) -->
      <?php if ($loggedin == true) : ?>
        <div class="dropdown ml-auto">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo "{$username}"; ?>
          </button>
          <div class="dropdown-menu gy" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Dashboard</a>
            <a class="dropdown-item" href="#">Inventory</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>

        <!-- If user isn't logged in, show log in and register button -->
      <?php else : ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>