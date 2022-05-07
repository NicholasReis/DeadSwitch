<?php
    session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['email']);
    unset($_SESSION['username']);
    header('Location:/deadswitch/index.php');
?>
