
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

    <body>
        <?php include 'nav.php'?>
        
        <?php 
			$emailchangedsuccessfully = false;
			$emailIsRepeated = false;
			
            include 'php_scripts/db_connection.php';
            $query = "SELECT Username, Password, Email FROM user WHERE Username = ?";

            if($stmt = $conn->prepare($query)) {
                $stmt->bind_param("s", $username);
                if ($stmt->execute()) {
                    $stmt->store_result();  
                    $stmt->bind_result($username, $password, $email);
                    $stmt->fetch();
                }
                $stmt->close();
            }

            if(isset($_POST['saveEmail'])){
                //Error handling
                //Checking if the email already exists in database
                $emailCheckQuery="SELECT Email FROM user WHERE Email=?;";
               
                if($stmt = $conn->prepare($emailCheckQuery)){
                    $stmt->bind_param("s", $_POST['emailUpdateInput']);
                    if ($stmt->execute()) {    
                        $stmt->store_result();  
                        if ($stmt->num_rows() > 0) {
                            $emailIsRepeated = true;
                            
                        }
                    }
                    $stmt->close();
                }

                

                if($emailIsRepeated == false){
                    $updateQuery = "UPDATE user
                    SET user.Email = ?
                    WHERE user.UserID = ?;";

                    if($stmt = $conn->prepare($updateQuery)) {
                        $stmt->bind_param("si", $_POST['emailUpdateInput'], $_SESSION["id"]);
                        if ($stmt->execute()) {
                            $email = $_POST['emailUpdateInput'];
                            $emailchangedsuccessfully = true;
                        }  
                        $stmt->close();
                    }
                }
            }

            if(isset($_POST['savePassword'])){
                $current_password = $_POST['currentPasswordInput'];
                $new_password = $_POST['newPasswordInput'];
                $new_password_confirmation = $_POST['newPasswordConfirmInput'];
				
				
                $do_passwords_match = true;
                $is_current_password_correct = true;
                if($new_password == $new_password_confirmation){
					$hashNew = hash ("sha256",$new_password);
					$hashCurrent = hash ("sha256",$current_password);
                    if($hashCurrent == $password){
                        $is_current_password_correct = true;
                        $updateQuery = "UPDATE user
                        SET Password = ?
                        WHERE UserID = ?;";
                        if($stmt = $conn->prepare($updateQuery)) {
                            $stmt->bind_param("si", $hashNew, $_SESSION["id"]);
                            if ($stmt->execute()) {
                                $password = $hashNew;
                                $password_changed_successfully = true;
                            }
                            $stmt->close();
                        }
                    }else{
                        $is_current_password_correct = false;
                    }
                }else{
                    $do_passwords_match = false;
                }
            }
            $conn->close();
        ?>

        <h1 class="display-3 d-flex mt-3 ms-5">Edit profile</h1>
        <div class="d-flex justify-content-center">
            <div class="login-register-form col-10 col-sm-10 col-md-7 col-lg-8 col-xl-5 col-xxl-5 px-4 py-3">    
                <p class="dashboard-username-heading mt-2 mb-0">Username:</p>
                <h5 class="mt-0 ms-1"><?php echo $username;?></h5>
                <form action="" method="post" class="">
                    <div class = "form-group mb-0">
                        <label for="InputEmail" class="login-register-labels mt-2">Email:</label> 
                        <input name="emailUpdateInput" type="text" class="form-control col-10 login-register-input" id="emailUpdateInput" value="<?php echo $email;?>">
                        <?php if($emailchangedsuccessfully == true): ?>
                            <p>email changed successfully</p>
                        <?php elseif($emailIsRepeated == true): ?>
                            <p>email is already taken</p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex justify-content-end mb-4 mt-4">
                        <button name="saveEmail" type="submit" class="btn col-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5 btn-dashboard btn-dashboard-save mt-0">Save email</button>
                    </div>
                    <hr>
                    <div class = "form-group">
                        <label for="currentPassword" class="login-register-labels">Current password:</label>
                        <input name="currentPasswordInput"type="password" class="form-control login-register-input" id="currentPassword">      
                    </div>
                    <div class = "form-group mt-3">
                        <label for="oldPassword" class="login-register-labels">New password:</label>
                        <input name="newPasswordInput"type="password" class="form-control login-register-input" id="oldPassword">      
                    </div>
                    <div class = "form-group mt-3">
                        <label for="oldPasswordConfirm" class="login-register-labels">Confirm new password:</label>
                        <input name="newPasswordConfirmInput"type="password" class="form-control login-register-input" id="oldPasswordConfirm">      
                    </div>      
                    <div class="d-flex justify-content-end mt-4">
                        <button name="savePassword" type="submit" class="btn btn-dashboard btn-dashboard-save col-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5  mt-0">Save password</button>
                    </div>
                </form>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>