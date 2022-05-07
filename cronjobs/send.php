<?php
	$sqlservername = "localhost";
	$sqlusername = "deadswit_nicholas";
	$sqlpassword = "S0l1dSn@k3";
	$dbname = "deadswit_804074deadswitch_db";
    
	//Create connection
	$conn = new mysqli($sqlservername, $sqlusername, $sqlpassword, $dbname);

	if($conn->connect_error){
		die("Connection failed with password" . $sqlpassword . ": " . $conn->connect_error);
	}
	
	require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	
	echo date("Y-m-d H:i:s");
	$sql = "SELECT id, sender, receiver, subject, message FROM messages WHERE send_date<='".date("Y-m-d")."'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()){
		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port       = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth   = true;
		$mail->Username = 'deadswitchmailer@gmail.com';
		$mail->Password = 'Suns3t_S@rs@p@r1ll@';
		$mail->SetFrom('deadswitchmailer@gmail.com', $row["sender"]);
		$mail->addAddress($row["receiver"], $row["receiver"]);
		//$mail->SMTPDebug  = 3;
		//$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
		//$mail->Debugoutput = 'echo';
		$mail->IsHTML(true);

		$mail->Subject = $row["subject"];
		$mail->Body    = $row["message"];
		$mail->AltBody = $row["message"];

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			$sql = "DELETE FROM messages WHERE id=".$row["id"];
			$conn->query($sql);
			echo 'Message has been sent and deleted';
		}
	}
?>
