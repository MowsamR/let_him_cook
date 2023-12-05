<?php
    $dbhost = 'localhost';
    $dbuser = 'root@localhost';
    $dbpass = 'root@123';
    $db_name = 'Lethimcook';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
