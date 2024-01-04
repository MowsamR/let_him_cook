<?php
      session_start();
      if (isset($_SESSION["id"])) {
        $username = $_SESSION["username"];
      }
      
?>
<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Edit profile</title>
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
  <?php 
    session_start();
    include 'php_scripts/db_connection.php';
    $query = "SELECT Username, Password, Email FROM user WHERE Username = ?";

    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $username);
        if ($stmt->execute()) {
            $stmt->store_result();  
            $stmt->bind_result($username, $password, $email);
            $stmt->fetch();
        }
        
    }

    if(isset($_POST['saveEmail'])){
        //Error handling
        //Checking if the email already exists in database
        $emailCheckQuery="SELECT Email FROM user WHERE Email=?;";
        $emailIsRepeated = false;
        if($stmt = $conn->prepare($emailCheckQuery)){
            $stmt->bind_param("s", $_POST['emailUpdateInput']);
            if ($stmt->execute()) {    
                $stmt->store_result();  
                if ($stmt->num_rows() > 0) {
                    $emailIsRepeated = true;
                    
                }
            }
        }

        $emailchangedsuccessfully = false;

        if($emailIsRepeated == false){
            $updateQuery = "UPDATE user
            SET Email = ?
            WHERE UserID = ?;";

            if($stmt = $conn->prepare($updateQuery)) {
                $stmt->bind_param("si", $_POST['emailUpdateInput'], $_SESSION["id"]);
                if ($stmt->execute()) {
                    $email = $_POST['emailUpdateInput'];
                    $emailchangedsuccessfully = true;
                }  
            }
        }
    }

    ?>
    <body>
        <?php include 'nav.php'?>
        
        <h1 class="display-3 d-flex ms-3">Edit profile</h1>
        <div class="d-flex justify-content-center">
            <div class="col-6">
                <p class="dashboard-username-heading mb-0">Username:</p>
                <h5 class="mt-0 ms-2"><?php echo $username;?></h5>
                <form action="" method="post">
                    <div class = "form-group mb-0 ">
                        <label for="InputEmail" class="dashboard-email-label">Email:</label> 
                        <input name="emailUpdateInput" type="text" class="form-control dashboard-email-input" id="emailUpdateInput" value="<?php echo $email;?>">
                        <?php if($emailchangedsuccessfully == true): ?>
                            <p>email changed successfully</p>
                        <?php elseif($emailIsRepeated == true): ?>
                            <p>email is already taken</p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex justify-content-end mb-4 mt-4">
                        <button name="saveEmail" type="save" class="btn col-4 col-md-5 btn-dashboard btn-dashboard-save mt-0">Save email</button>
                    </div>
                    <hr>
                    <div class = "form-group">
                        <label for="InputPassword" class="dashboard-pass-label">Current password:</label>
                        <input name="passwordUpdateInput"type="password" class="form-control dashboard-pass-input" id="InputPassword">      
                    </div>
                    <div class = "form-group mt-3">
                        <label for="InputPassword" class="dashboard-pass-label">New password:</label>
                        <input name="passwordUpdateInput"type="password" class="form-control dashboard-pass-input" id="InputPassword">      
                    </div>
                    <div class = "form-group mt-3">
                        <label for="InputPassword" class="dashboard-pass-label">Confirm new password:</label>
                        <input name="passwordUpdateInput"type="password" class="form-control dashboard-pass-input" id="InputPassword">      
                    </div>      
                    <div class="d-flex justify-content-end mt-4">
                        <button name="passwordUpdateInput" type="save" class="btn col-4 col-md-5 col-xs-10 btn-dashboard btn-dashboard-save mt-0">Save password</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>