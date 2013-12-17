<?php

	// Henter connect oplysninger
	include_once('connect.php');

	$childname = $_POST["childname"];
	$childage = $_POST["childage"];
	$family_id = $_POST["user_id"];

	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	// if(!isset($childname)){
	// 	header('Location: ../index.php');
	// }

	$i = 0;

	if(!empty($family_id)){
		if (is_array($childname)){
			foreach($childname as $child) {
				if(!empty($child) && !empty($childage[$i])){
					// Indsætter børnene i databasem
					$createchild = mysql_query("INSERT INTO children (name, age, family_id) VALUES ('$child', '" . $childage[$i] . "', '$family_id')") or die(mysql_error());
				}
				else{
					$respons = "Failure";
				}
				$i++;
			}
		}
		else{
			if(!empty($childname) && !empty($childage[$i])){
				// Indsætter børnene i databasem
				$createchild = mysql_query("INSERT INTO children (name, age, family_id) VALUES ('$childname', '" . $childage[$i] . "', '$family_id')") or die(mysql_error());
			}
			else{
				$respons = "Failure";
			}
		}

		if($createchild){
			$respons = "Succes+" . $family_id;
		}
		else{
			$respons = "Failure";
		}
	}
	
	else{
		$respons = "Failure";
	}

	echo json_encode(array("msg" => $respons));


?>