<?php
	if (!session_id()) {
		session_start();
	}	

	$mail = $_POST["mail"];
	$password = $_POST["password"];

	// Encrypt password
	$password_finale = md5($password);

	// Connect til server
	include('connect.php');

	$users = mysql_query("SELECT mail, password, user_id FROM user WHERE mail = '$mail' AND password = '$password_finale'") or die(mysql_error());

	$user = mysql_fetch_assoc($users);

	$user_id_md5 = md5($user['user_id']);
	$user_id = $user['user_id'];
	$user_mail = $user['mail'];

	if(!empty($user)){
		$respons = "succes+$user_id+$user_id_md5+$user_mail";
	}

	else{
		$respons = "failure";
	}

	echo json_encode(array("msg" => $respons));



?>
