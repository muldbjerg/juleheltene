<?php
	include('inc/header.php');
?>


<div id="wrapper">

	<div class="col-md-4">

		<!-- Til oprettelse af brugere -->
		<h3>Opret helte-konto</h3>
		<form id="createHero" method="post"action="functions/createhero.php">
			<input type="text" name="firstname" placeholder="Fornavn" required>
			<input type="text" name="surname" placeholder="Efternavn" required>
			<input type="email" name="mail" placeholder="Mail" required>
			<input type="text" name="zipcode" placeholder="Postnr" required>
			<input type="password" id="password" name="password" placeholder="Kode" required>
			<input type="password" id="password_again" name="password_again" placeholder="Bekræft kode" required>
			<input id="submit" type="submit" value="Opret helt">
		</form>

	</div>

	<div class="col-md-4">
		<h3>Opret familie-konto</h3>
		<form id="createFamily" method="post"action="functions/createfamily.php">
			<input type="text" name="firstname" placeholder="Fornavn" required>
			<input type="text" name="surname" placeholder="Efternavn" required>
			<input type="email" name="mail" placeholder="Mail" required>
			<input type="text" name="address" placeholder="Adresse" required>
			<input type="text" name="zipcode" placeholder="Postnr" required>
			<input type="password" id="password" name="password" placeholder="Kode" required>
			<input type="password" id="password_again" name="password_again" placeholder="Bekræft kode" required>
			<input type="checkbox" name="visit" value="0">Ønsker ikke fremmøde på adressen<br/>
			<input id="submit" type="submit" value="Opret familie">
		</form>
	</div>



	<div class="col-md-4">
		<h3>Helte</h3>
		<?php
			// Henter connecting elementerne til databasen
			include_once('functions/connect.php');

			// Indhenter informationer omkring brugerne
			$users = mysql_query('SELECT * FROM user WHERE role LIKE "hero"');

			while($user = mysql_fetch_assoc($users)) { //Lav en while der kører alle rækker igennem
				echo "<p><a href='hero.php?id=" . $user['user_id'] . "'>" . $user['firstname'] . "</a></p>";  
			}

		?>
		<h3>Familier</h3>
		<?php
			// Henter connecting elementerne til databasen
			include_once('functions/connect.php');

			// Indhenter informationer omkring brugerne
			$users = mysql_query('SELECT * FROM user WHERE role LIKE "family"');

			while($user = mysql_fetch_assoc($users)) { //Lav en while der kører alle rækker igennem
				echo "<p><a href='family.php?id=" . $user['user_id'] . "'>Familien " . $user['surname'] . "</a></p>";  
			}

		?>
	</div>


</div> <!-- Slut på #wrapper -->







<?php
	include('inc/footer.php');
?>