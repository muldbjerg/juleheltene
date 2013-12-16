<?php

	include('connect.php');

	CREATE TABLE user(
	    user_id INT AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(200),
		surname VARCHAR(200),
	    role VARCHAR(20),
	    wishlist INT(10),
	    description VARCHAR(1000),
	    image_name VARCHAR(400),
	    mail VARCHAR(200),
	    password VARCHAR(200),
	    address VARCHAR(400),
	    zipcode INT(4),
		visit BIT,
	    created DATETIME
	)


	CREATE TABLE children(
	    child_id INT AUTO_INCREMENT PRIMARY KEY,
	    name VARCHAR(400),
	    age INT(4),
	    family_id INT(20)
	)

	CREATE TABLE wishes(
	    wish_id INT AUTO_INCREMENT PRIMARY KEY,
	    wish VARCHAR(1000),
	    child_id INT(20)
	)

?>