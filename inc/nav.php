<?php
	$prelink = (file_exists("index.php")) ? "" : "../";
?>

<div id="navIndexDiv"><a id="navIndex" href="<?php echo $prelink ?>index.php">Forside</a></div>
<div id="navWishDiv"><a id="navWish" href="<?php echo $prelink ?>wishlists.php">Ønskesedler</a></div>
<div id="navAboutDiv"><a id="navAbout" href="<?php echo $prelink ?>heroes.php">Julehelte</a></div>