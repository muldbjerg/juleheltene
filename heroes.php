<?php
	include('inc/header.php');
?>


<div id="wrapper">
		


	<div id="heroesPage">
		<div class="content col-md-12">
			<div id="infographic">
				<div class="col-md-4">
					<img src="img/info1.png" alt="">
					<p>1. Find dit gamle legetøj</p>
				</div>
				<div class="col-md-4">
					<img src="img/info2.png" alt="">
					<p>2. Pak det fint ind.  på den tilsendte adresse</p>
				</div>
				<div class="col-md-4">
					<img src="img/info3.png" alt="">
					<p>3. Send det med posten, eller levere det direkte til et glad barn</p>
				</div>
				
			</div>

			<hr>

			<div id="aboutHeroes" class="contentAreas ">
				<div id="heroPics" class="col-md-6 mobileHidden">
					<?php
												// Connecter til mysql databasen
						include_once('functions/connect.php');

						// Henter informationer om familier fra SQL
						$heroes = mysql_query("SELECT * FROM user WHERE role = 'hero' ORDER BY created DESC LIMIT 0,9 ");
						$i = 0;

						while($hero = mysql_fetch_assoc($heroes)){
							echo "<div class='col-md-3' id='heroPic" . $i . "' style='background-image:url('" . $hero['image_name'] . "')'>";
							echo "<a href='hero.php?id=" . $hero['user_id'] . "'>" . $hero['firstname'] . "<img src='' alt=''></a>";
							echo "</div>";


							$i++;
						}
					?>


				</div>
				<div class="col-md-6">
					<h1>Juleheltene</h1>
					<p>Julehelte er et fællesskab af personer som alle har det til fælles at vi kæmper for at alle børn kan få en god jul. Vi husker julen som noget magisk da vi var børn og dette vil vi gerne give videre.</p>
					<p>Julehelte er skabt af folk der giver uden at få noget tilbage for det. Det er helte som redder julen for andre. Rigtigt mange ligger inde med brugt tøj, legetøj og andre ting til børn som er i fin stand og som andre børn kan få glæde af. Det er nemt at hjælpe andre.</p> 
					<p>Organisation bygger 100% på frivillige og har som mål at alle børn mindst skal have et ønske opfyldt til jul.</p>
				</div>
			</div>
			

			<div class="theend"></div>

		</div> <!-- Slut på content -->
		
		<div id="instagramFeed" class="mobileHidden" datatag="julehelte">
		</div>
		

		<div class="content col-md-12">
			<div id="aboutHistory" class="contentAreas">
				<div class="col-md-6">
					<p>Julehelte spreder glæde i juletiden, og hjælper familier med </p>
				</div>
				<div id="heroVideo" class="col-md-6">
					
				</div>
			</div>

			<div class="theend"></div>
		</div>


	</div>


</div> <!-- Slut på #wrapper -->


	



<?php
	include('inc/footer.php');
	echo "<script src='js/instagram.js'></script>";
?>