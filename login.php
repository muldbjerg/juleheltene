<?php
	include('inc/header.php');
?>


<div id="wrapper">
		


	<div id="loginPage">
		<div class="content col-md-12">
			<div class="col-md-8">
				

				<form id="loginForm" method="post" action="functions/loginfunction.php">
					<input type="email" name="mail" placeholder="Mail"> 
					<input type="password" name="password" placeholder="Kode"> 
					<div class="buttonDiv white">
						<button>Login</button>
					</div>
				</form>
				
				<div class="buttonDiv white logout">
					<button id="logout">Log ud</button>	
				</div>

			</div>
			
			<div class="col-md-4">

				<div class="col-md-5 createLinks">
					<div class="buttonDiv" id="giftButton">
						<a href="createHero.php">
							<button>Opret helt</button>
						</a>
					</div>
				</div>

				<div class="col-md-5 col-md-offset-1  createLinks">
					<div class="buttonDiv" id="wishlistButton">
						<a href="createFamily.php">
							<button>Skriv ønske- seddel</button>
						</a>
					</div>
				</div>

			</div>

			<div class="theend"></div>
		</div> <!-- Slut på content -->

	</div>


</div> <!-- Slut på #wrapper -->


	



<?php
	include('inc/footer.php');
	echo "<script src='js/login.js'></script>";
?>