<?php
	$firstname = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['firstname']))));
	$surname = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['surname']))));
	$mail = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['mail']))));
	$zipcode = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['zipcode']))));
	$password = md5(mysql_real_escape_string(strip_tags(trim(addslashes($_POST['password'])))));
	date_default_timezone_set('Europe/Copenhagen'); 
	$created = date('Y-m-d-H-i');

	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	if(!isset($firstname)){
		header('Location: ../index.php');
	}

	// Henter connect oplysninger
	include('connect.php');

	// Tjekker om mailen er brugt
	$checkMail_query = "SELECT COUNT(*) FROM user WHERE mail = '" . $mail . "'";
	$checkMail = mysql_fetch_assoc(mysql_query($checkMail_query));
	$checkMail_count = $checkMail['COUNT(*)'];

	if($checkMail_count < 1){
		// Indsætter brugeren i databasen
		$createhero = mysql_query("INSERT INTO user (firstname, surname, role, password, mail, zipcode, created) VALUES ('$firstname', '$surname', 'hero', '$password' , '$mail', '$zipcode', '$created')") or die(mysql_error());
		
		// Henter user_id ud sådan det kan sendes med tilbage
		$user_id_query = "SELECT user_id, mail FROM user WHERE mail = '" . $mail . "'";
		$user_id_array = mysql_fetch_assoc(mysql_query($user_id_query));
		$user_id = $user_id_array['user_id'];

		$user_id_md5 = md5($user_id);
		$user_mail = $user_id_array['mail'];

		if($createhero){
			$respons = "succes+$user_id+$user_id_md5+$user_mail";
		}
		else {
			$respons = "Failure";
		}
	}
	else{
		$respons = "Usedmail";
	}

	echo json_encode(array("msg" => $respons));


?>