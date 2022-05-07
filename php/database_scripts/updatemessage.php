<?php
    session_start();
    include '../session_scripts/loggedin.php';
    include 'database_connection/connect.php';
    
    $sql = "UPDATE messages SET receiver = '".$_POST["email"]."', message='".$_POST["message"]."', send_date='".$_POST["sendDate"]."' WHERE id=".$_POST["id"];
    
    $result = $conn->query($sql);
    echo $result;
    $conn->close();
?>
