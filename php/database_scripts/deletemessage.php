<?php
    session_start();
    include '../session_scripts/loggedin.php';
    include 'database_connection/connect.php';
    
    $sql = "DELETE FROM messages WHERE id=".$_POST["id"];
    
    $result = $conn->query($sql);
    if($result==1){
        echo "Successfully deteled";
    }else{
        echo $result;
    }
    $conn->close();
?>
