<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let Him Cook </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: user_authentication/login.html");
        exit();
    } else {
        $username = $_SESSION["username"];
        echo "Welcome " . $username;
    }
?>


<body>
    <li><a href="index.php"> Home </a></li>
    <li><a href="user_authentication/register.html"> Login / Register </a></li>
    <li><a href="search.php"> Search </a></li>
    <h1> Homepage </h1>
    <p>Welcome to Let Him Cook
    <p>
    <p> Our mission is to make home cooking accessible to all wheather you're a complete beginner or a seasoned vetran
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>