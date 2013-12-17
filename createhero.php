<?php
	include('inc/header.php');
?>


<div id="wrapper">

	<div id="createHeroPage">
		<div class="col-md-12 content">

			<div class="col-md-4 ">
				
				<!-- Til oprettelse af brugere -->
				<h3>Opret helte-konto</h3>
				<form id="createHero" method="post">
					<input type="text" name="firstname" placeholder="Fornavn" required>
					<input type="text" name="surname" placeholder="Efternavn" required>
					<input type="email" name="mail" placeholder="Mail" required>
					<input type="text" name="zipcode" placeholder="Postnr" required>
					<input type="password" id="password" name="password" placeholder="Kode" required>
					<input type="password" id="password_again" name="password_again" placeholder="Bekræft kode" required>
				
					<div class="buttonDiv">
						<button type="submit">Opret helt</button>
					</div>
				</form>

			</div>
			
			<div class="theend"></div>

		</div>
	</div>



</div> <!-- Slut på #wrapper -->


<?php
	include('inc/footer.php');
	echo "<script src='js/createHero.js'></script>";
?>