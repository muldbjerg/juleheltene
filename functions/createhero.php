<?php
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$mail = $_POST['mail'];
	$zipcode = $_POST['zipcode'];
	$password = md5($_POST['password']);
	date_default_timezone_set('Europe/Copenhagen'); 
	$created = date('Y-m-d-H-i');

	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	if(!isset($firstname)){
		header('Location: ../index.php');
	}

	// Henter connect oplysninger
	include('connect.php');

	// Indsætter brugeren i databasen
	$createhero = mysql_query("INSERT INTO user (firstname, surname, role, password, mail, zipcode, created) VALUES ('$firstname', '$surname', 'hero', '$password' , '$mail', '$zipcode', '$created')") or die(mysql_error());

	if($createhero){
		$respons = "Thanks for your rating - we appreciate every feedback, we get.";
	}
	else {
		$respons = "Sorry - something went wrong, have a beer and try again later.";
	}

	echo json_encode(array("msg" => $respons));


?>