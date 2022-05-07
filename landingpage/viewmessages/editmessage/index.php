<?php
 	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
	include $path.'/deadswitch/php/session_scripts/loggedin.php';
    	include $path.'/deadswitch/php/database_scripts/database_connection/connect.php';
    $id = $_POST["id"];
    
    $sql = "SELECT receiver, message, send_date FROM messages WHERE id=".$id;
    
    $result = $conn->query($sql);

    $rowCount = $result->num_rows;
    if ($rowCount > 0) {
        $row = $result->fetch_assoc(result);
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/deadswitch/css/style.css"/>
		<script src="/deadswitch/js/scripts.js"></script>
		<title>Edit Message</title>
	</head>
	<h3>Recipient Email</h3>
	<input id='email' type='email' value='".$row["receiver"]."'></input><br>
	<br><h3>Message</h3>
	<textArea id='message' rows='15' cols='50'><?php echo $row["message"] ?></textArea><br>
	<h5>Your account name will be included for authentication, if it won't be recognized by the recipient consider including your name or verification to let them know it's you.</h5><br>
	<br>Send Date<br>
	<input id='sendDate' type='date' id='datemin' name='datemin' min='2000-01-02' value='<?php echo $row["send_date"] ?>'></input><br>
	<br><button onClick='viewMessage()'>Back</button> &nbsp
	<button onClick='updateMessage(<?php echo $id ?>, email.value, message.value, sendDate.value)'>Save</button>;
</html>

<?php
    }else{
	echo "No results found";
    }
        
?>
