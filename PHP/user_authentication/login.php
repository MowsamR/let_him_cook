<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
session_start();
//Create connection to database
include '../db_connection.php';
if (isset($_POST['login'])) {
    //Get login data from form and store them in respective variables
    $usernameOrEmail = $_POST["username/email"];
    $inputPassword = $_POST["password"];

    //Check if Username or Email already exists in the system
    $query = "SELECT UserID, Username, Email, Password FROM User WHERE Username = ? OR Email = ?";
    //Prepare SQL Statement
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);

        //Run the SQL command
        if ($stmt->execute()) {
            $stmt->store_result();
            //if there is a result with the matching username or email, run this: 
            if ($stmt->num_rows() == 1) {
                //bind the 'outputs' of the SQL command to these variables respectively and fill them via fetch()
                $stmt->bind_result($id, $username, $email, $password);
                $stmt->fetch();

                //check if the password entered matches the password in the database
                if ($inputPassword === $password) {
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    header("Location: ../index.php");
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
    <li><a href="../index.php"> Home </a></li>
    <li><a href="register.php"> Login / Register </a></li>
    <li><a href="search.php"> Search </a></li>

    <h2>Login Section</h2>
    <form action="login.php" method="post">
        <label for="username/email">Username or Email</label>
        <input type="text" name="username/email" id="username/email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <input name="login" type="submit" value="Login" />

        <p>Don't have an account?
            <a href="register.php"> Register here</a>
        </p>
    </form>
</body>

</html>