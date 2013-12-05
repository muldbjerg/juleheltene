<?php

	// Henter connect oplysninger
	include('connect.php');

	

	$childname = $_POST["childname"];
	$childage = $_POST["childage"];
	$childgender = $_POST["childgender"];
	$family_id = $_POST["family_id"];

	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	if(!isset($childname)){
		header('Location: ../index.php');
	}


	$i = 0;

	foreach ($childname as $child) {
		if(!empty($child) && !empty($childage[$i]) && !empty($childgender[$i])){
			// Indsætter børnene i databasem
			$createchild = mysql_query("INSERT INTO children (name, age, gender, family_id) VALUES ('$child', '" . $childage[$i] . "', '" . $childgender[$i] . "', '$family_id')") or die(mysql_error());
		}
		$i++;	
	}

	if($createchild){
		$respons = "Succes";
	}
	else {
		$respons = "Sorry - something went wrong, have a beer and try again later.";
	}

	echo json_encode(array("msg" => $respons));


?>