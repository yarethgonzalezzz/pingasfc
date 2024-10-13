<?php

	include "include/conexion.php";
	
	$vcedulaProveedor=$_REQUEST['pcedula']; 
	
	$query="delete from tbl_proveedores where cedulaProveedor=$vcedulaProveedor";
	
	if (mysqli_query($conexion,$query))
	{
		mysqli_close($conexion);
		echo '<script languaje="javascript">';
		echo 'alert("Registro Eliminado Exitosamente");';
		echo 'window.location="proveedores.php";';
		echo '</script>';
	}
	else
	{
		mysqli_close($conexion);
		echo '<script languaje="javascript">';
		echo 'alert("Registro NO Eliminado");';
		echo 'window.location="proveedores.php";';
		echo '</script>';

	}		

?>