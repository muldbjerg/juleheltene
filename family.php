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
			    $user_id = $user['user_id'];
			    $firstname = $user['firstname'];
			    $surname = $user['surname'];
			    $created = $user['created'];
			    $description = $user['description'];
			}
			
			// Hvis man prøver at komme ind på en side, hvor der ikke er nogen bruger, bliver man sendt til forsiden
			if(!isset($firstname)){
				echo "<script>location.href='index.php';</script>";
				
			}

		?>


<div id="wrapper">

	<div id="familyPage">
		<div class="content col-md-12">



			<div class="col-md-4">
				<h1><?php echo "Ønskeseddel " . $user_id ?></h1>

				<p id="description"><?php echo $description ?></p>

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

		<div class="theend"></div>
		
		</div>
	</div>

</div> <!-- Slut på #wrapper -->





<?php

	include('inc/footer.php');
	echo "<script src='js/createChild.js'></script>";

?>