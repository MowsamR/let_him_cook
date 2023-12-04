<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>
    <?php
    if (isset($_POST['register'])) {
        //Create connection to database
        include 'db_connection.php';

        //Get registration data from form and store them in respective variables
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        //ERROR HANDLING:
        //Check if any inputs are empty
        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            //Redirect user to complete the form again
            //To avoid rewriting inputs again, prepopulate fields that were written before.
            header("Location: ../PHP/user_register.php?error=emptyfields&username=" . $username . "&email=" . $email);
            exit();
            // Check if both passwords match
        } elseif ($password != $confirmPassword) {
            header("Location: ../PHP/user_register.php?error=emptyfields&username=" . $username . "&email=" . $email);
        }
        //run else statement if no input errors so far
        else {
            //Check if Username or Email already exists in the system
            $sql = "SELECT Username, Email FROM User WHERE Username = ? OR Email = ?";
            //Prepare SQL Statement
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $username, $email);
            //Run the SQL command
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() > 0) {
                //bind the outputs from SQL command to these variables respectively and fill them via fetch()
                $stmt->bind_result($usernameResult, $emailResult);
                $stmt->fetch();

                if ($username == $usernameResult) {
                    echo "Username is already taken.";
                } elseif ($email == $emailResult) {
                    echo "Email is already taken.";
                }
            } else {
                echo "Successfully created a new account.";
            }

        }
    }

    ?>
    <form action="user_register.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="text" name="password" id="password">
        <label for="confirmPassword">Confirm Password</label>
        <input type="text" name="confirmPassword" id="confirmPassword">
        <input name="register" type="submit" value="Register">
    </form>
</body>

</html>