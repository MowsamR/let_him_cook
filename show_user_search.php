<?php
session_start();
if (isset($_SESSION["id"])) {
  $username = $_SESSION["username"];
  $loggedin = true;
} else {
  $loggedin = false;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Let Him Cook</title>
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
      <?php include 'nav.php';?>
      <form class="col-8 mx-auto mt-4" action="show_user_search.php" method="POST" id="user_search_form">
        <div class="form-group">
          <label for="search_user" class="login-register-labels">Search for a user: </label>
          <input class="form-control login-register-input" type="search" id='user_to_find' name='user_to_find' aria-label="Search">
        </div>
        <div class="d-flex justify-content-end mt-3 mb-3">
            <button name="search_user" type="submit" class="btn btn-login col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">Search</button>
        </div>
      </form>
      <?php 
        include "php_scripts/db_connection.php";
        
        if (isset($_POST['search_user'])) {
          $username_to_find = $_POST['user_to_find'];
          $query = "SELECT UserID, Username FROM user WHERE Username LIKE ?";

          if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $username_to_find);

            if ($stmt->execute()) {
              $stmt->store_result();

              if ($stmt->num_rows > 0 && $username_to_find!=$username) {
                $stmt->bind_result($searched_user_id, $searched_user_username);
                echo "<hr class='col-11 mx-auto'>";
                echo "<h2 class='search-result-heading mt-2 ms-3'> Search results for '" .  $username_to_find . "': </h2>";
                $followed_user_id = $_SESSION["id"];
                while ($stmt->fetch()) {
                  $is_user_a_follower_query = "SELECT COUNT(*) FROM followers WHERE FollowedID = ? AND FollowerID = ?;";
                  //$is_user_a_follower_query = "SELECT COUNT(*) FROM inventory WHERE InventoryID = username AND IngredientID = IngID;";
                  if($is_user_a_follower_stmt = $conn->prepare($is_user_a_follower_query)){
                    $is_user_a_follower_stmt->bind_param("ii", $followed_user_id, $searched_user_id);
                    if($is_user_a_follower_stmt->execute()){
                      $is_user_a_follower_stmt->bind_result($count);
                      $is_user_a_follower_stmt->fetch();
                      if($count > 0){
                        echo "
                        <div class='login-register-form d-flex col-5 mx-auto mt-3 px-4 py-2'>          
                          <h4 class='my-auto'>" . $searched_user_username . "</h4>
                          <button class='btn modal-unfollow-btn col-4 ms-auto' id='unfollowUser" . $searched_user_id . "' onclick='unfollowUser($searched_user_id, $followed_user_id)'>Unfollow</button>
                        </div>
                        ";
                      }else{                
                        echo "
                        <div class='login-register-form d-flex col-5 mx-auto mt-3 px-4 py-2'>          
                          <h4 class='my-auto'>" . $searched_user_username . "</h4>
                          <button class='btn modal-follow-btn col-4 ms-auto' id='followUser" . $searched_user_id . "' onclick='followUser($searched_user_id, $followed_user_id)'>Follow</button>
                        </div>
                        ";                        
                      }
                    }
                  }
                  $is_user_a_follower_stmt->close();
                }
              } else {
                echo "<h2 class='search-result-heading mt-2 ms-3'> Not found </h2>";
              }
            }

            $stmt->close();
          }

          $conn->close();
        }

      ?>
    <script src="javascript/unfollowAndFollow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
