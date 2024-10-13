<?php
	
	$dbhost="localhost";
	$dbuser="root";
	$dbpsw="";
	$dbname="bd_inventario";

	
	$conexion=mysqli_connect($dbhost,$dbuser,$dbpsw,$dbname);
	
	if (mysqli_connect_errno())
	{
		echo 'Existe un problema para realizar la conexion a la BD: ' . mysqli_connect_error();
	}	
	
	
	

?>