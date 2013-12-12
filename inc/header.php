<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Juleheltene</title>


<!-- Stylesheets -->
<link rel="stylesheet" href="css/screen.css" />

<!-- Viewport -->
<meta name="viewport" content="width=device-width">


</head>

<body>

	<?php
		$prelink = (file_exists("index.php")) ? "" : "../";
	?>


	<header>
		
		<div id="wrapper">
			<div id="logo" class="col-md-4">
				<a href="<?php echo $prelink ?>index.php"><img src="img/logo.png" alt="Juleheltene's logo"></a>
			</div>

			<a href="login.php">
				<div id="loginBox"><img src="img/lock.png">Log ind</div>
			</a>

			<nav id="mainNav" class="mobileHidden col-md-8">
				<?php
					include('inc/nav.php');
				?>
			</nav>
			<nav id="mobileNav" class="col-md-12">
				<?php
					include('inc/nav_mobile.php');
				?>
				<div class="theend"></div>
			</nav>
		</div>


	</header>