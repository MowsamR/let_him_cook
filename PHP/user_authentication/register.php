<?php
//Create connection to database
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
                    } else {
                        echo "Error: Could not insert user: " . $conn->error;
                    }
                }
                $insertQuery->close();
            } else {
                echo "Error: Could not execute SQL Query: " . $conn->error;
            }
        } else {
            echo "Error: Could not prepare SQL Query: " . $conn->error;
        }
        $stmt->close();
    }
} else {
    header("Location: register.html");
    exit();
}
$conn->close();
