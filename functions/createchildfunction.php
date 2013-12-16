<?php

	// Henter connect oplysninger
	include('connect.php');

	

	$childname = mysql_real_escape_string(strip_tags(trim(addslashes($_POST["childname"]))));
	$childage = mysql_real_escape_string(strip_tags(trim(addslashes($_POST["childage"]))));
	$family_id = mysql_real_escape_string(strip_tags(trim(addslashes($_POST["family_id"]))));

	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	if(!isset($childname)){
		header('Location: ../index.php');
	}


	$i = 0;

	foreach ($childname as $child) {
		if(!empty($child) && !empty($childage[$i])){
			// Indsætter børnene i databasem
			$createchild = mysql_query("INSERT INTO children (name, age, family_id) VALUES ('$child', '" . $childage[$i] . "', '" . $childgender[$i] . "', '$family_id')") or die(mysql_error());
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