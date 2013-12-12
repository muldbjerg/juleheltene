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
						for ($i=0; $i<6; $i++) {

							echo "<div class='col-md-4' id='heroPic" . $i . "'>hej</div>";

						}

					?>
				</div>
				<div class="col-md-6">
					<h1>Juleheltene</h1>
					<p>Julehelte spreder glæde i juletiden, og hjælper familier med. Julehelte spreder glæde i juletiden, og hjælper familier med-Julehelte spreder glæde i juletiden, og hjælper familier med </p>
					<p>Julehelte spreder glæde i juletiden, og hjælper familier med. Julehelte spreder glæde i juletiden, og hjælper familier med-Julehelte spreder glæde i juletiden, og hjælper familier med </p>
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
?>