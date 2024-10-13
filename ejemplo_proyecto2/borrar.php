<?php
	include "include/conexion.php";
	

	$vcedula=$_REQUEST['pcedula'];   //pcedula es el parametro que viene de la pagina index.php


	$query = "delete from tbl_alumnos where cedula=$vcedula";
	
	

	if(mysqli_query($conexion, $query))
	{
		echo '<script language="javascript">';
		echo 'alert("Registro eliminado exitosamente");';
		echo 'window.location="estudiantes.php";';  //ya no lo devuelvo a la pagina index sino que a la pagina estudiantes
		echo '</script>';
		
	} else {
		echo '<script language="javascript">';
		echo 'alert("Error eliminando registro!");';
		echo 'window.location="estudiantes.php";';  //ya no lo devuelvo a la pagina index sino que a la pagina estudiantes
		echo '</script>';
	}
	
	
	
?>
	
	
	
	