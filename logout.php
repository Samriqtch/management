<?php

session_start();
// Check if the user is logged in

if(isset($_SESSION["login"])) {
    header("Location: home.php");
}
else {
    header("Location: login.php");
}



?>