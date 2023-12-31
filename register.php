<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Register</title>
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
session_start();
include 'php_scripts/db_connection.php';
if (isset($_POST['register'])) {

    //Get registration data from form and store them in respective variables
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    //ERROR HANDLING:
    $query = "SELECT UserID, Username, Email FROM user WHERE Username = ? OR Email = ?;";
    // Check if both passwords match
    if ($password != $confirmPassword) {
        echo "Password does not match.";
        exit();
    }
    //run else statement if no input errors so far
    else {
        //Check if Username or Email already exists in the system
        $query = "SELECT UserID, Username, Email FROM user WHERE Username = ? OR Email = ?;";
        //Prepare SQL Statement
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $username, $email);

            //Run the SQL command
            if ($stmt->execute()) {
                $stmt->store_result();
                
                if ($stmt->num_rows() > 0) {
                    
                    //bind the 'outputs' of the SQL command to these variables respectively and fill them via fetch()
                    $stmt->bind_result($id, $usernameResult, $emailResult);
                    $stmt->fetch();
                    if ($username === $usernameResult) {
                        echo "Username is already taken.";
                    } elseif ($email === $emailResult) {
                        echo "Email is already taken.";
                    }
                    
                } else {
                    //If no errors so far, create a new User Record
                    $insertQuery = "INSERT INTO `user`(`Username`, `Password`, `Email`)
                                    VALUES (?, ?, ?);";     
                    $insertStmt = $conn->prepare($insertQuery);                         
                    $insertStmt->bind_param("sss", $username, $password, $email);         
                    if ($insertStmt->execute()) {    
                        //$_SESSION['id'] = $id;
                        //$_SESSION['username'] = $username;
                        header("Location: login.php");
                        exit();
                    } else {
                        echo "Error: Could not insert user: " . $conn->error;
                    }
                }
                $insertStmt->close();
            } else {
                echo "Error: Could not execute SQL Query: " . $conn->error;
            }
        } else {
            echo "Error: Could not prepare SQL Query: " . $conn->error;
        }
        $stmt->close();
    }
} 
$conn->close();
?>

<body>
    <h1 class="display-1 justify-content-center d-flex login-heading">LHC</h1>
    <div class="justify-content-center d-flex">
      <div class="col-4 login-form">
        <form action="register.php" method="post">
          <div class = "form-group">
            <label for="username" class="login-email-label">Username:</label>
            <input type="text" name="username" class="form-control" id="username" required>
          </div>
          <div class = "form-group">
            <label for="email" class="login-pass-label">Email:</label>
            <input type="email" name="email" class="form-control login-email-label" id="email" required>      
          </div>
          <div class = "form-group">
            <label for="password" class="login-pass-label">Password:</label>
            <input type="password" name="password" class="form-control login-password-input" id="password" required>      
          </div>
          <div class = "form-group">
            <label for="confirmPassword" class="login-pass-label">Re-enter Password:</label>
            <input type="password" name="confirmPassword" class="form-control login-password-input" id="confirmPassword" required>      
          </div>
          <div class="d-flex justify-content-end">
            <button name="register" type="submit" class="btn col-4 btn-login">Register</button>
          </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      </div>
    </div>
</body>

</html>