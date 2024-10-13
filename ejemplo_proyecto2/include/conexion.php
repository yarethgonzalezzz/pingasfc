<?php
	/* este pagina permitira realizar la conexion a la base de datos*/
	
	//variables de conexion
	$dbhost="localhost";
	$dbuser="root";
	$dbpsw="";
	$dbname="phputc";
	
	
	//funcion
	
	//cadena de conexion
	$conexion=mysqli_connect($dbhost,$dbuser,$dbpsw,$dbname);

	//$conexion=mysqli_connect("localhost","root","","");
	
	if (mysqli_connect_errno()) //	if (mysqli_connect_errno() == true)
	{
		echo 'Existe un problema para realizar la conexion con la BD: ' . mysqli_connect_error();
		
	}
	
?>