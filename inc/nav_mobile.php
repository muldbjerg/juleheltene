<?php
	$prelink = (file_exists("index.php")) ? "" : "../";
?>

<div id="navIndexDivM"><a id="navIndexM" href="<?php echo $prelink ?>index.php"><img src="img/gift1text.png" alt="Gå til forsiden"></a></div>
<div id="navWishDivM"><a id="navWishM" href="<?php echo $prelink ?>wishlists.php"><img src="img/gift2text.png" alt="Gå til ønskesedler"></a></div>
<div id="navAboutDivM"><a id="navAboutM" href="<?php echo $prelink ?>heroes.php"><img src="img/gift3text.png" alt="Gå til at læse omkring julehelte"></a></div>