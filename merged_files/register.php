<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
//Create connection to database
session_start();
include '../db_connection.php';
if (isset($_POST['register'])) {

    //Get registration data from form and store them in respective variables
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    //ERROR HANDLING:

    // Check if both passwords match
    if ($password != $confirmPassword) {
        echo "Password does not match.";
        exit();
    }
    //run else statement if no input errors so far
    else {
        //Check if Username or Email already exists in the system
        $query = "SELECT UserID, Username, Email FROM User WHERE Username = ? OR Email = ?";
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
                    $insertQuery = "INSERT INTO `User`(`Username`, `Password`, `Email`)
                                    VALUES (?, ?, ?)";
                    $insertStmt = $conn->prepare($insertQuery);
                    $insertStmt->bind_param("sss", $username, $password, $email);

                    if ($insertStmt->execute()) {
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;
                        header("Location: ../index.php");
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
    <li><a href="../index.php"> Home </a></li>
    <li><a href="register.php"> Login / Register </a></li>
    <li><a href="search.php"> Search </a></li>

    <h2>Registration Section</h2>
    <form action="register.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email Address</label>
        <input type="text" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirmPassword" id="confirmPassword" required>

        <input name="register" type="submit" value="Register" />

        <p>Already a have an account?
            <a href="login.php"> Login</a>
        </p>
    </form>
</body>

</html>