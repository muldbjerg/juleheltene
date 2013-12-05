<?php
	include('inc/header.php');
?>

<?php
	
	// Henter id fra url'en 
	$id = $_GET['id'];

	// Henter connecting elementerne til databasen
	include_once('functions/connect.php');

	// Indhenter informationer omkring brugerne
	$users = mysql_query('SELECT * FROM user WHERE user_id =' . $id . ' && role = "family" ');

	// Skriver informationer om brugeren ud
	while($user = mysql_fetch_assoc($users)) {
	    $firstname = $user['firstname'];
	    $surname = $user['surname'];
	    $created = $user['created'];
	}
	
	// Hvis man prøver at komme ind på en side, hvor der ikke er nogen bruger, bliver man sendt til forsiden
	if(!isset($firstname)){
		echo "<script>location.href='index.php';</script>";
		
	}

?>


<div id="wrapper">



	<div class="col-md-4">
		<h1><?php echo "Familien " . $surname ?></h1>
		<p>Oprettet <?php echo $created ?></p>

	</div>
	<div class="col-md-8">
		<h3>Families børn</h3>
		
		<?php
			// Henter connecting elementerne til databasen
			include_once('functions/connect.php');

			// Indhenter informationer omkring brugerne
			$children = mysql_query('SELECT * FROM children WHERE family_id LIKE "' . $id . '"');

			while($child = mysql_fetch_assoc($children)) { //Lav en while der kører alle rækker igennem
				echo "<p>" . $child['name'] . ", " . $child['age'] . " år</p>";  
			}

		?>

	</div>

	<div class="col-md-8 col-md-offset-4">
		<h3>Opret børn</h3>

		<button id="addChild">Tilføj endnu et barn</button>

		<form id="createChild" method="post" action="functions/createChild.php">
			<input name="childname[]" placeholder="Skriv navn">
			<input name="childage[]" placeholder="Skriv alder">
			<select name="childgender[]">
			  <option value="man">Dreng</option>
			  <option value="woman">Pige</option>
			</select>
			<select class="displayNone" name="family_id"><option value="<?php echo $id ?>">12</option></select>
			<input type="submit" value="Opret børn">
		</form>

	</div>

</div> <!-- Slut på #wrapper -->





<?php

	include('inc/footer.php');
	echo "<script src='js/createChild.js'></script>";

?>