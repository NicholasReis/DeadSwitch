<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    include $path.'/deadswitch/php/database_scripts/database_connection/connect.php';
    
    $email = strtolower($_POST['email']);
    
    $sql = "SELECT * FROM users WHERE email='".$email."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo 1;
    }else{
        echo 0;
    }
?>
