<?php
    $sqlservername = <server name>;
    $sqlusername = <user name>;
    $sqlpassword = <password>;
    $dbname = <database name>;
    
    //Create connection
    $conn = new mysqli($sqlservername, $sqlusername, $sqlpassword, $dbname);

            

    if($conn->connect_error){
        die("Failed to connect");
    }
?>
