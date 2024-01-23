

<nav class="navbar navbar-expand-md navbar-expand-lg navbar-expand-xl navbar-expand-xxl">
  <div class="container mx-auto my-1">
    <a class="navbar-brand" href="index.php">Let Him Cook</a>
    
    <!-- Toggle Menu Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse lhc-nav" id="navbarNav">
      
      <ul class="navbar-nav ms-lg-auto ms-xl-auto ms-xxl-auto">
        <!-- Search Bar -->
        <li class="nav-item">
          <form class="form-inline w-100 d-flex
          mx-1
          me-lg-4 me-xl-3 me-xxl-3
          mt-3 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0"
          action="search_result.php" method="POST">
            <div class="form-group col-9 col-md-8">
              <input class="form-control navbar-search-input" type="search" id='searchFood' name='searchFood' aria-label="Search">
            </div>
            <button class="btn nav-search-btn navbar-search-btn ms-1 col-3 col-md-4" name="Submit" type="submit" required>Search</button>
          </form>
        </li>
        <li class="nav-item
        ms-1 ms-md-3 ms-lg-3 ms-xl-3 ms-xxl-3
        me-1 me-md-2 me-lg-3 me-xl-3 me-xxl-3
        mt-1 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0
        ">
          <a class="nav-link dishes-link-nav" href="#">Dishes</a>
        </li>

        <!-- If user is logged in, show relevant previlaged actions (Check dashboard, inventory, logout, etc) -->
        <?php if ($loggedin == true) :?>
        <div class="vr d-none d-md-block d-lg-block d-xl-block d-xxl-block"></div>
        <li class="nav-item justify-content-end dropdown
            ms-1 ms-md-2 ms-lg-2 ms-xl-2 ms-xxl-2
            me-0
            mt-1 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0
          ">
          <div class="dropdown">
            <button class="btn nav-dropdown-btn dropdown-toggle justify-content-end col-12 dropdown"
            type="button"data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo "Welcome {$username}!";?>
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
          <li class="nav-item
          ms-1 ms-md-3 ms-lg-2 ms-xl-2 ms-xxl-2
          me-1 me-md-0 me-lg-0 me-xl-0 me-xxl-0
          mt-1 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0
          ">
            <a class="nav-link" href="login.php">Log in</a>
          </li>
          <li class="nav-item
          ms-1 ms-md-0 ms-lg-0 ms-xl-0 ms-xxl-0
          me-1
          mt-1 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0
          ">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <?php endif;?>
        
      </ul>
      
    </div>
  </div>
</nav>
