<?php
	$firstname = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['firstname']))));
	$surname = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['surname']))));
	$mail = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['mail']))));
	$zipcode = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['zipcode']))));
	$description = mysql_real_escape_string(strip_tags(trim(addslashes($_POST['description']))));
	$password = md5(mysql_real_escape_string(strip_tags(trim(addslashes($_POST['password'])))));
	date_default_timezone_set('Europe/Copenhagen'); 
	$created = date('Y-m-d-H-i');

	if(!isset($_POST['visit'])){
		$visit = true;
	}
	else{
		$visit = false;
	}

	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	if(!isset($firstname)){
		header('Location: ../index.php');
	}

	// Henter connect oplysninger
	include('connect.php');

	// Tjekker om der er oprettet en familie med den mail før.
	$checkMail_query = "SELECT COUNT(*) FROM user WHERE mail = '" . $mail . "'";
	$checkMail = mysql_fetch_assoc(mysql_query($checkMail_query));
	$checkMail_count = $checkMail['COUNT(*)'];

	if($checkMail_count < 1){
		// Tildeler ønskesedlen et nr. 
		$wistlist_count_array = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) FROM user WHERE role = 'family'"));
		$wistlist_count = $wistlist_count_array['COUNT(*)'] + 1; 

		// Indsætter brugeren i databasen
		$createfamily = mysql_query("INSERT INTO user (firstname, surname, role, wishlist, description, password, mail, zipcode, visit, created) VALUES ('$firstname', '$surname', 'family', '$wistlist_count', '$description', '$password' , '$mail', '$zipcode', '$visit', '$created')") or die(mysql_error());

		$user_id_query = "SELECT user_id FROM user WHERE mail = '" . $mail . "'";
		$user_id_array = mysql_fetch_assoc(mysql_query($user_id_query));
		$user_id = $user_id_array['user_id'];


		if($createfamily){
			$respons = "Succes+" . $user_id;
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