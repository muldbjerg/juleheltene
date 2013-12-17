<?php

	// Henter connect oplysninger
	include('connect.php');

	// $childname = mysql_real_escape_string(strip_tags(trim(addslashes($_POST["childname"]))));
	// $childage = mysql_real_escape_string(strip_tags(trim(addslashes($_POST["childage"]))));
	// $family_id = mysql_real_escape_string(strip_tags(trim(addslashes($_POST["user_id"]))));

	$childname = $_POST["childname"];
	$childage = $_POST["childage"];
	$family_id = $_POST["user_id"];




	// Hvis man prøver at gå direkte derind - bliver man sendt tilbage
	// if(!isset($childname)){
	// 	header('Location: ../index.php');
	// }

	$children_count = count($childname);

	$i = 0;
	$n = 0;

	if (is_array($childname)){
		foreach($childname as $child) {
			if(!empty($child) && !empty($childage[$i])){
				// Indsætter børnene i databasem
				$createchild = mysql_query("INSERT INTO children (name, age, family_id) VALUES ('$child', '" . $childage[$i] . "', '$family_id')") or die(mysql_error());
			}
			$i++;	
		}
	}
	else{
		if(!empty($child) && !empty($childage[$i])){
			// Indsætter børnene i databasem
			$createchild = mysql_query("INSERT INTO children (name, age, family_id) VALUES ('$child', '" . $childage[$i] . "', '$family_id')") or die(mysql_error());
		}
	}
	

	$child_id_array = mysql_query("SELECT child_id FROM children WHERE family_id = '$family_id'") or die(mysql_error());

	$child_ids = mysql_fetch_assoc($child_id_array);

	if (is_array($child_ids)){
		foreach ($child_ids as $child_id) {
		$string = $n . "wish";
		$wishes = $_POST["$string"];

			foreach ($wishes as $wish) {	
				// Renser wish inputtet
				$wish_f = mysql_real_escape_string(strip_tags(trim(addslashes($wish))));
				
				// Indsætter ønsket i databasen
				$createWish = mysql_query("INSERT INTO wish (name, child_id) VALUES ('" . $wish_f['name'] . "," . $child_id['child_id'] . ")") or die(mysql_error());


			}
		}
	}
	// else{
	// 	$wishes = $_POST['0wish'];

	// 	if (is_array($wishes)){
	// 		foreach ($wishes as $wish) {	
	// 			// Renser wish inputtet
	// 			$wish_f = mysql_real_escape_string(strip_tags(trim(addslashes($wish))));
				
	// 			// Indsætter ønsket i databasen
	// 			$createWish = mysql_query("INSERT INTO wish (name, child_id) VALUES ('" . $wish_f['name'] . ", " . $child_id['child_id'] . ")") or die(mysql_error());


	// 		}
	// 	}

	// 	else{
	// 		$createWish = mysql_query("INSERT INTO wish (name, child_id) VALUES ('" . $wishes['name'] . ", " . $child_id['child_id'] . ")") or die(mysql_error());

	// 	}
	// }





	// for($s = 1; $s < $children_count+1; $s++){
		
	// 	$string = $n . "wish";
	// 	$wishes = $_POST["$string"];

	// 	foreach ($wishes as $wish) {
			
	// 		// Renser wish inputtet
	// 		$wish_f = mysql_real_escape_string(strip_tags(trim(addslashes($wish))));
			
	// 		// Indsætter ønsket i databasen
	// 		$createWish = mysql_query("INSERT INTO wish (name, age, family_id) VALUES ('$child', '" . $childage[$i] . "', '" . $childgender[$i] . "', '$family_id')") or die(mysql_error());


	// 	}

	// 	$n ++;
	// }

	
	// if($createchild){
	// 	$respons = "Succes";
	// }
	// else {
	// 	$respons = "Sorry - something went wrong, have a beer and try again later.";
	// }

	echo json_encode(array("msg" => $child_id_array ));


?>