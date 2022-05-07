<?php
	session_start();
	include "../session_scripts/loggedin.php";
        include "database_connection/connect.php";
        
	$email = $_SESSION['email'];
        $receiver = $_POST['receiver'];
	$subject = $_POST['subject'];
        $message = $_POST['message'];
        $sendDate = $_POST['sendDate'];
       
	//Breaks with '  
        $sql = "INSERT INTO messages values(null, '".$email."', '".$receiver."', '".$subject."', '".$message."', '".$sendDate."')";
	$result = $conn->query($sql);
        echo $result;
?>
