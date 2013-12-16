<?php
	include('inc/header.php');
?>


<div id="wrapper">

	<div id="createchildrenPage">
		<div class="content col-md-12">

			<h3>Skriv ønskesedler</h3>

				<?php
					$user_id = $_POST['user_id'];
				?>


				<!-- Til oprettelse af brugere -->
				<form id="createChild" method="post">
					<div class="col-md-6">
						<input name="childname[]" placeholder="Skriv navn">
						<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
						<input name="childage[]" placeholder="Skriv alder">

						<div id="buttonDiv">
							<button>Færdig</button>
						</div>
					</div>
					
					<div class="col-md-6">
						<div>
							<input class="wishes" type="text" name="wish[]" placeholder="Skriv ønske">
							<input class="wishes" type="text" name="wish[]" placeholder="Skriv ønske">
							<input class="wishes" type="text" name="wish[]" placeholder="Skriv ønske">
						</div>
						<div id="plusButtonDiv">
							<button id="plusButton">+</button>
						</div>
					</div>
					
				</form>

				<hr>
							
			
			<div class="theend"></div>
		</div>
	</div>

</div> <!-- Slut på #wrapper -->







<?php
	include('inc/footer.php');
	echo "<script src='js/createChild.js'></script>";
?>