<?php

	include "include/conexion.php";
	
	$vcodigo=$_REQUEST['pcodigo']; 
	
	$query="delete from tbl_articulos where codigo=$vcodigo";
	
	if (mysqli_query($conexion,$query))
	{
		mysqli_close($conexion);
		echo '<script languaje="javascript">';
		echo 'alert("Registro Eliminado Exitosamente");';
		echo 'window.location="articulos.php";';
		echo '</script>';
	}
	else
	{
		mysqli_close($conexion);
		echo '<script languaje="javascript">';
		echo 'alert("Registro NO Eliminado");';
		echo 'window.location="articulos.php";';
		echo '</script>';

	}		

?>