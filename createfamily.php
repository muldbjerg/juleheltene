<?php
	include('inc/header.php');
?>


<div id="wrapper">

	<div id="createfamilyPage">
		<div class="content col-md-12">

			<h3>Opret Familie</h3>

			<div class="col-md-6">


				<!-- Til oprettelse af brugere -->
				<form id="createFamily" method="post"action="functions/createfamily.php">
					<input type="text" name="firstname" placeholder="Fornavn" required>
					<input type="text" name="surname" placeholder="Efternavn" required>
					<input type="email" name="mail" placeholder="Mail" required>
					<input type="text" name="address" placeholder="Adresse" required>
					<input type="text" name="zipcode" placeholder="Postnr" required>
					<input type="password" id="password" name="password" placeholder="Kode" required>
					<input type="password" id="password_again" name="password_again" placeholder="Bekræft kode" required>
					<div class="checkbox">
						<input type="checkbox" name="visit" id="visit" value="0"><label for="visit">Ønsker ikke fremmøde på adressen</label>
					</div>
				
			</div>

			<div class="col-md-6">
				<h6>Skriv lidt om familiens situation</h6>
				<textarea name="description" required></textarea>

				<div class="buttonDiv">
					<button>Næste step</button>
				</div>
				</form>

			</div>


				
			
			<div class="theend"></div>
		</div>
	</div>

</div> <!-- Slut på #wrapper -->







<?php
	include('inc/footer.php');
	echo "<script src='js/createFamily.js'></script>";
?>