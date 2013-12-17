<?php

	// Henter connect oplysninger
	include_once('connect.php');

	$wishes = $_POST["wish"];
	$chil_id = $_POST["child_id"];

	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	// if(!isset($childname)){
	// 	header('Location: ../index.php');
	// }

	// $wishes_count = count($wishes);

	$i = 0;

	// if(!empty($wishes) && !empty($chil_id)){


	if (is_array($wishes)){
		foreach($wishes as $wish) {
			if(!empty($wish)){
				$createwishes = mysql_query("INSERT INTO wishes (name, child_id) VALUES ('$wish', '" . $chil_id[$i] . "')") or die(mysql_error());
			
				$i++;	
			}		
		}
	}
	else{
		if(!empty($wish)){
			$createwishes = mysql_query("INSERT INTO wishes (name, child_id) VALUES ('$wishes', '$chil_id')") or die(mysql_error());
		}	
	}
	

	if($createwishes){
		$respons = "Succes";
	}
	else{
		$respons = "Failure";
	}


	// if(!empty($child) && !empty($childage[$i])){
	// 	whil()
	// 	// Indsætter ønskerne i databasen
	// 	$createchild = mysql_query("INSERT INTO wish (name, child_id) VALUES ('$child', '" . $chil_id[$i] . "', '$family_id')") or die(mysql_error());
	// }
	// else{
	// 	$respons = "Failure";
	// }
	

	echo json_encode(array("msg" => $respons));


?>