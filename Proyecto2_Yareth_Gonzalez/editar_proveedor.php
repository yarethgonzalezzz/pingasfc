<?php

	if (isset($_POST['Actualizar'])) 
	{
		$vcedulavieja=$_POST['cedulavieja'];
		$vcedulaProveedor=$_POST['cedulaProveedor'];
		$vnombreProveedor=$_POST['nombreProveedor'];
		$vtelefonoProveedor=$_POST['telefonoProveedor'];
		$vcodigoProvincia=$_POST['codigoProvincia'];
	  
		include "include/conexion.php";
		
		$query = "UPDATE tbl_proveedores SET cedulaProveedor='$vcedulaProveedor',nombreProveedor='$vnombreProveedor',telefonoProveedor='$vtelefonoProveedor',codigoProvincia=$vcodigoProvincia where cedulaProveedor=$vcedulavieja";
		
		if(mysqli_query($conexion, $query))
		{
			mysqli_close($conexion);
			echo '<script language="javascript">';
			echo 'alert("Registro actualizado exitosamente");';
			echo 'window.location="proveedores.php";';
			echo '</script>';
		
		} 
		else
		{
			mysqli_close($conexion);
			echo '<script language="javascript">';
			echo 'alert("Error en proceso de actualizacion de registro!");';
			echo 'window.location="proveedores.php";';
			echo '</script>';
		}  
		
	  }


      
	  if ($_REQUEST['pcedula'] !=null)
	  {
		  	include "include/conexion.php";
							
			$valorcedula=$_REQUEST['pcedula'];  
							
									
			$consulta = mysqli_query($conexion,"select * from tbl_proveedores where cedulaProveedor=$valorcedula");
			
			while($registro = mysqli_fetch_array($consulta))
			{
				$fcedulaProveedor=$registro['cedulaProveedor'];
				$fnombreProveedor=$registro['nombreProveedor'];
				$ftelefonoProveedor=$registro['telefonoProveedor'];
				$fcodigoProvincia=$registro['codigoProvincia'];
			}
			
			mysqli_close($conexion);
		  
	  }

	  include "include/header.php"; 



		
	?>
<div class="container">
			<div class="row">
				<div class="col-md-12">
				
					<h2 class="mt-4">Editar datos del proveedor <?php  echo $fnombreProveedor?> </h2>
					<hr>
					<form action="" method="post">
						<div class="form-group">
							<label for="cedulaProveedor">Cedula</label>
							<input type="text" name="cedulaProveedor" id="cedulaProveedor"  value="<?php echo $fcedulaProveedor ?>" class="form-control">
						</div>
								
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombreProveedor" id="nombreProveedor"  value="<?php  echo $fnombreProveedor ?>" class="form-control">
						</div>
						
													
						<div class="form-group">
							<label for="telefono">Teléfono proveedor</label>
							<input type="text" name="telefonoProveedor" id="telefonoProveedor"  value="<?php  echo $ftelefonoProveedor ?>" class="form-control">
						</div>
						
								
								
						<br> <br>
							
						<div class="form-group">
							<label for="codigoProvincia">Seleccione la provincia: </label>
							<select name="codigoProvincia">
								<option value="1" <?php if ($fcodigoProvincia == 1) echo "selected"; ?> > San José </option>
								<option value="2" <?php if ($fcodigoProvincia == 2) echo "selected"; ?> > Alajuela </option>
								<option value="3" <?php if ($fcodigoProvincia == 3) echo "selected"; ?> > Cartago </option>
								<option value="4" <?php if ($fcodigoProvincia == 4) echo "selected"; ?> > Heredia </option>
								<option value="5" <?php if ($fcodigoProvincia == 5) echo "selected"; ?> > Guanacaste </option>
								<option value="6" <?php if ($fcodigoProvincia == 6) echo "selected"; ?> > Puntarenas </option>
								<option value="7" <?php if ($fcodigoProvincia == 7) echo "selected"; ?> > Limón 
								</option>
							</select>
								
						</div>
								
								
						<div class="form-group">
							<input type="hidden" name="cedulavieja" id="cedulavieja"  value="<?php echo $fcedulaProveedor ?>" class="form-control">
						</div>
								
						<br> <br>
						<div class="form-group">
							
							<input type="submit" name="Actualizar" class="btn btn-primary" value="Actualizar">
							<a class="btn btn-warning" href="provedores.php">Regresar al inicio</a>
						</div>
						
							
					</form>
				</div>
			</div>
		</div>



	<?php include "include/footer.php"; ?>