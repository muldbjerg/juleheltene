<?php
	$user_id = 4; // $_POST['user_id'];

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


			<?php
				// Henter connect oplysninger
				include_once('functions/connect.php');

				// Henter informationer om børnene i familien
				$children_array = mysql_query("SELECT name, child_id FROM children WHERE family_id = '" . $user_id  . "'");
				
				$i = 0;
				while($child = mysql_fetch_assoc($children_array)){
						$child_name[$i] = $child['name'];
						$child_id[$i] = $child['child_id'];
					$i++;
				}

				$child_count = count($child_name);
				echo $child_count;


			?>


				<!-- Til oprettelse af børn -->
				<form id="createWishes" method="post">
										
					<div class="col-md-12 createWishesDiv">
						
						<?php
							include('inc/wishesFields.php');
						?>
						
						<div class="theend"></div>
					</div>

					<!-- <hr> -->

					<div class="buttonDiv col-md-12">
							<button id="moreWishes">Flere ønsker</button>
							<button type="submit">Færdig</button>
					</div>
					
				</form>

				
							
			
			<div class="theend"></div>
		</div>
	</div>

</div> <!-- Slut på #wrapper -->







<?php
	include('inc/footer.php');
	echo "<script src='js/createwishes.js'></script>";
?>