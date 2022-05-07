<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    include $path.'/deadswitch/php/database_scripts/database_connection/connect.php';
    
    $username = $_POST['username'];
    $email = strtolower($_POST['email']);
    $pass = $_POST['password'];
    
    $sql = "INSERT INTO users values('".$username."', '".$email."', PASSWORD('".$pass."'))";
    $result = $conn->query($sql);
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    echo $result;
?>
