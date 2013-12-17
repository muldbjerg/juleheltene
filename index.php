<?php
	include('inc/header.php');
?>


<div id="wrapper">
	
	<div class="mobileHidden" id="frontDescription">
		<h3>Jul er for alle - derfor hjælpeR juleheltene forældre give deres børn hvad de ønsker sig</h3>
	</div>
	
	
	<div id="indexPage">
		<div class="content col-md-12">
			<div id="callToAction"> 
				<div id="help">
					<a href="createHero.php">
						<img src="img/helpPic.png" alt="Hjælp med en gave">
					</a>
				</div>
				<div id="wish">
					<a href="createFamily.php">
						<img src="img/wishPic.png" alt="Skriv en ønskeseddel">
					</a>
				</div>
			</div>


			<div class="wishLists">
				<h2>Hjælp børnene</h2>

					<?php
						// Connecter til mysql databasen
						include_once('functions/connect.php');

						// Henter informationer om familier fra SQL
						$families = mysql_query("SELECT * FROM user INNER JOIN children ON user.user_id = children.family_id GROUP BY user_id ORDER BY wishlist DESC LIMIT 0,6 ");
						$i = 0;

						echo "<div class='listRow'>";

						// Loop der skaber ønskesedlerne på forsiden
						while($family = mysql_fetch_assoc($families)){

							 
							// Opretter ønskeselderne
							echo "<div class='col-md-4'><div class='wishList js-masonry'>";
							echo "<a href='family.php?id=" . $family['user_id'] . "'>";
							echo "<h3>Ønskeseddel " . $family['wishlist'] . "</h3>";
								
								// Henter familiens børn
								$children_query = "SELECT * FROM children WHERE family_id = '" . $family['user_id'] . "'";
								$children = mysql_query($children_query);

								// Tæller hvor mange børn familien her
								$children_count_query = "SELECT COUNT(*) FROM children WHERE family_id = '" . $family['user_id'] . "'";
								$children_count_array = mysql_fetch_assoc(mysql_query($children_count_query));
								$children_count = $children_count_array['COUNT(*)'];
								$n = 0;

								// Skriver børnenes navn og alder
								echo "<h6>";
									while($child = mysql_fetch_assoc($children)) {
										echo $child['name'] . ", " . $child['age'] . " år" ;
										
										// Sætter & ind mellem børnene
										if($n >= 0 && $n < ($children_count - 1)){
											echo " & ";
										}

										$n++;

									}
								echo "</h6>";

								// echo "";


								echo "<p class='description'>" . $family['description'] . "</p><div class='descriptionOverlay'></div>";

								echo "<p class='wishLink'>Se ønskesedlen</p>";


							echo "</a></div></div>";



							$i++;
						}		

						echo "</div>";	
					
					?>
				

				<div class="buttonDiv">
					<a href="wishlists.php">
						<button>Se flere</button>
					</a>
				</div>
			</div>
		
			<hr>

			<div>
				<div id="countUp" class="col-md-4">
					<p>Juleheltene har hjulpet</p>
					<p>248</p>
					<p>Børn i år</p>
				</div>

				<div id="handbook" class="col-md-8">
					<a href="handbook.php">
						<img src="img/handbook.png" alt="Læs heltenes håndbog">
					</a>
				</div>


			</div>
			<div class="theend"></div>




		</div> <!-- Slut på content -->
		<div id="contest">
			<a href="contest.php">
				<div class="mobileHidden">
					<img src="img/heart.png" alt=""><img src="img/heart.png" alt="">
				</div>
				<div id="contestText">
					<p><span class="oswald">KONKURENCE:</span> Lav den mest kreative indpakning, vinderen bliver udgivet i den næste udgave af hobby-nyt.</p>				
				</div>
			</a>
		</div>


	</div>	


</div> <!-- Slut på #wrapper -->


	



<?php
	include('inc/footer.php');
	// echo "<script src='js/index.js'></script>";
	// echo "<script src='js/masonry.min.js'></script>";

?>