<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    include $path.'/deadswitch/php/database_scripts/database_connection/connect.php';
    
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email='".$email."' AND password=PASSWORD('".$pass."')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
	$arr = mysqli_fetch_assoc($result);
        $_SESSION['loggedin'] = true;
	$_SESSION['email'] = $email;
        $_SESSION['username'] = $arr['username'];
	echo 1;
    }else{
        echo 0;
    }
?>
