<?php

//connect.php

	//connect.php
	$server = "localhost";
	$username   = "root";
	$password   = "";
	$database   = "jabasof";
 
	$link = new mysqli($server, $username,  $password, $database);


$server = "localhost";
$username   = "Jabasof";
$password   = "jabasof";
$database   = "jabasof";

$link = new mysqli($server, $username,  $password, $database);

if(!$link)
{
	exit('Impossible d établir une connection avec la base de donnée.');
}
if ($result = $link->query("SELECT DATABASE()")) {
	$row = $result->fetch_row();
	//printf("La base de données courante est %s.\n", $row[0]);
	$result->close();
}

?>	