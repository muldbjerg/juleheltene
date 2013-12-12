<?php
	include('inc/header.php');
?>


<div id="wrapper">
	
	<div class="mobileHidden" id="frontDescription">
		<h3>Jul er for alle - derfor hjælpeR juleheltene forældre give deres børn hvad de ønsker.</h3>
	</div>
	
	
	<div id="indexPage">
		<div class="content col-md-12">
			<div id="callToAction"> 
				<div id="help">
					<img src="img/helpPic.png" alt="Hjælp med en gave">
				</div>
				<div id="wish">
					<img src="img/wishPic.png" alt="Skriv en ønskeseddel">
				</div>
			</div>


			<div class="wishLists">
				<h2>Hjælp børnene</h2>

					<?php
						// Connecter til mysql databasen
						include_once('functions/connect.php');

						// Henter informationer om familier fra SQL
						$families = mysql_query("SELECT * FROM user WHERE role = 'family' GROUP BY user_id ORDER BY user_id DESC LIMIT 0,6");
						$i = 0;

						// Loop der skaber ønskesedlerne på forsiden
						while($family = mysql_fetch_assoc($families)){

							// Inddeler ønskesedlerne i rækker
							if($i == 0 || $i == 3 ){
								echo "<div class='listRow'>"; 
							}

								// Opretter ønskeselderne
								echo "<div class='col-md-4'><div class='wishList'>";
								echo "<h3>Ønskeseddel " . $family['user_id'] . "</h3>";
									
									// Henter familiens børn
									$children_query = "SELECT * FROM children WHERE family_id = '" . $family['user_id'] . "'";
									$children = mysql_query($children_query);

									// Tæller hvor mange børn familien her
									$children_count_query = "SELECT COUNT(*) FROM children WHERE family_id = '" . $family['user_id'] . "'";
									$children_count_array = mysql_fetch_assoc(mysql_query($children_count_query));
									$children_count = $children_count_array['COUNT(*)'];

									echo "<h5>";
									$n = 0;


										while($child = mysql_fetch_assoc($children)) {
											echo $child['name'] . ", " . $child['age'] . " år" ;
											
										
											if($n >= 0 && $n < ($children_count - 1)){
												echo " & ";
											}

											$n++;

										}
									echo "</h5>";

									echo "<h6>" . $family['user_id'] . "</h6>"

								echo "</div></div>";

							if($i == 2 || $i == 5){
								echo "</div>"; 
							}

							$i++;
						}
							

							
						
					
					?>
				

				<div id="buttonDiv">
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
?>