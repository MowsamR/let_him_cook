<?php
//Create connection to database
include 'db_connection.php';
if (isset($_POST['login'])) {
    //Get login data from form and store them in respective variables
    $usernameOrEmail = $_POST["usernameInput"];
    $inputPassword = $_POST["passwordInput"];


    //Check if Username or Email already exists in the system
    $query = "SELECT UserID, Usename, Email, Password FROM user WHERE Usename = ? OR Email = ?;";
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