<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db_name = 'LHCv0.2';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db_name);

    if (!$conn) {
        die("Connection failed: " . $mysqli_connect_error());
    }