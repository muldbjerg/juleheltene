<?php
	$user_id = $_POST['user_id'];

	// Tjekker om brugerne forsøger at springe over.
	// if(empty($user_id)){
	// 	header('Location: index.php');
	// }

	include('inc/header.php');
?>


<div id="wrapper">

	<div id="createchildrenPage">
		<div class="content col-md-12">

			<h3>Skriv ønskesedler</h3>


				<!-- Til oprettelse af børn -->
				<form id="createChild" method="post">
					<div class="childField field1 col-md-12">
						<div class="col-md-6">
							<input name="childname[]" placeholder="Skriv navn">
							<input type="number" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
							<input name="childage[]" placeholder="Skriv alder">
							
						</div>
						
						<!-- <div class="col-md-6">
							<div>
								<input class="wishes" type="text" name="0wish[]" placeholder="Skriv ønske">
								<input class="wishes" type="text" name="0wish[]" placeholder="Skriv ønske">
								<input class="wishes" type="text" name="0wish[]" placeholder="Skriv ønske">
								<input class="wishes" type="text" name="0wish[]" placeholder="Skriv ønske">
								<input class="wishes" type="text" name="0wish[]" placeholder="Skriv ønske">
							</div>
						</div> -->

						<div class="theend"></div>
					</div>

					<!-- <hr> -->

					<div class="buttonDiv col-md-12">
							<button id="oneMoreChild">Et barn mere</button>
							<button type="submit">Næste trin</button>
					</div>
					
				</form>

				
							
			
			<div class="theend"></div>
		</div>
	</div>

</div> <!-- Slut på #wrapper -->







<?php
	include('inc/footer.php');
	echo "<script src='js/createChild.js'></script>";
?>