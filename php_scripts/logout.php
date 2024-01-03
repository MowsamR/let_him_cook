<?php
session_start();

//remove all $_SESSION variables
session_unset();

//End user session
session_destroy();

//redirect the user to login page
header("Location: ../index.php");

exit();

