<?php
    session_start();
    include '../session_scripts/loggedin.php';
    include 'database_connection/connect.php';
    
    $sql = "SELECT id, receiver, message, send_date FROM messages WHERE sender='".$_SESSION["email"]."'";
    $result = $conn->query($sql);

    $index = 0;
    $messageArray = array();
    $rowCount = $result->num_rows;
    if ($rowCount > 0) {
        while($row = $result->fetch_assoc()) {
		$messageRow = array();
		$messageRow[0] = $row['id'];
		$messageRow[1] = $row['receiver'];
		$messageRow[2] = $row['message'];
		$messageRow[3] = $row['send_date'];
		$messageArray[$index] = $messageRow;
		$index += 1;
	}
    }
    echo json_encode($messageArray);
$conn->close();
?>
