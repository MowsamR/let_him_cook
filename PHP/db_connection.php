<?php
    $dbhost = 'localhost';
    $dbuser = 'root@localhost';
    $dbpass = 'root@123';
    $db_name = 'Lethimcook';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db_name);

    if ($mysqli→connect_errno) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo("Successful connection to database");
    $mysqli→close();
?>
