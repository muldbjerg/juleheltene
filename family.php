<?php
	include('inc/header.php');
?>

<?php
	
	// Henter id fra url'en 
	$id = $_GET['id'];

	// Henter connecting elementerne til databasen
	include_once('functions/connect.php');

	// Indhenter informationer omkring brugerne
	$users = mysql_query('SELECT * FROM user WHERE user_id =' . $id . ' && role = "family" ');

	// Skriver informationer om brugeren ud
	while($user = mysql_fetch_assoc($users)) {
	    $firstname = $user['firstname'];
	    $surname = $user['surname'];
	    $created = $user['created'];
	}
	
	// Hvis man prøver at komme ind på en side, hvor der ikke er nogen bruger, bliver man sendt til forsiden
	if(!isset($firstname)){
		echo "<script>location.href='index.php';</script>";
		
	}

?>


<div id="wrapper">



	<div class="col-md-4">
		<h1><?php echo "Familien " . $surname ?></h1>
		<p>Oprettet <?php echo $created ?></p>

	</div>

</div> <!-- Slut på #wrapper -->







<?php
	include('inc/footer.php');
?>