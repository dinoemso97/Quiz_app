<?php 


try {
	
	$config = new PDO('mysql: host=localhost; dbname=phpquizz;','root','');
	
	
	//$config->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	//$config->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
	$config->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
}
catch(PDOException $e) {
	
	
	echo $e->getMessage();
	die();
	
}