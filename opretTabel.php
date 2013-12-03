<?php

	include('connect.php');

	mysql_query("CREATE TABLE user(
	    user_id INT AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(200),
		surname VARCHAR(200),
	    role VARCHAR(20),
	    description VARCHAR(1000),
	    image_name VARCHAR(400),
	    mail VARCHAR(200),
	    password VARCHAR(200),
	    address VARCHAR(400),
	    zipcode INT(9999),
		visit BIT,
	    created DATETIME
	)") OR DIE(mysql_error());


	CREATE TABLE events(
	    id INT AUTO_INCREMENT PRIMARY KEY,
	    name VARCHAR(200),
	    description VARCHAR(1000),
	    location VARCHAR(200),
	    start DATETIME,
	    slut DATETIME,
	    link VARCHAR(300)
	)

?>