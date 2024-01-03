<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
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
    //Create connection to database
    include 'php_scripts/db_connection.php';
    if (isset($_POST['login'])) {
        //Get login data from form and store them in respective variables
        $usernameOrEmail = $_POST["usernameInput"];
        $inputPassword = $_POST["passwordInput"];


        //Check if Username or Email already exists in the system
        $query = "SELECT UserID, Username, Password, Email FROM user WHERE Username = ? OR Email = ?;";
        //Prepare SQL Statement
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);

            //Run the SQL command
            if ($stmt->execute()) {
                $stmt->store_result();
                //if there is a result with the matching username or email, run this: 
                if ($stmt->num_rows() == 1) {
                    //bind the 'outputs' of the SQL command to these variables respectively and fill them via fetch()
                    $stmt->bind_result($id, $username, $password, $email);
                    $stmt->fetch();

                    //check if the password entered matches the password in the database
                    if ($inputPassword === $password) {
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;
                        header("Location: index.php");
                    } else {
                        echo "Incorrect Password";
                    }
                }
            } else {
                echo "Error: Could not execute SQL Query: " . $conn->error;
            }
        } else {
            echo "Error: Could not prepare SQL Query: " . $conn->error;
        }
        $stmt->close();
    }

    $conn->close();
  ?>
  <body>
    <h1 class="display-1 justify-content-center d-flex login-heading">LHC</h1>
    <div class="justify-content-center d-flex">
      <div class="col-4 login-form">
        <form action="login.php" method="post">
          <div class = "form-group">
            <label for="InputEmail" class="login-email-label">Email:</label>
            <input name="usernameInput"type="text" class="form-control" id="InputEmail">
          </div>
          <div class = "form-group">
            <label for="InputPassword" class="login-pass-label">Password:</label>
            <input name="passwordInput"type="password" class="form-control login-password-input" id="InputPassword">      
          </div>
          <div class="d-flex justify-content-end">
            <button name="login" type="submit" class="btn col-4 btn-login">Login</button>
          </div>
        </form>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   </body>
</html>