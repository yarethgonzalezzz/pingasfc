	
	<?php
		
		
		if (!empty($_POST['Registrar']))
		{
			include "include/conexion.php";
			
			$vcedulaProveedor=$_POST['cedulaProveedor'];
			$vnombreProveedor=$_POST['nombreProveedor'];
			$vtelefonoProveedor=$_POST['telefonoProveedor'];
			$vcodigoProvincia=$_POST['codigoProvincia'];
			
			$query="insert into tbl_proveedores(cedulaProveedor,nombreProveedor,telefonoProveedor,codigoProvincia) values('$vcedulaProveedor','$vnombreProveedor','$vtelefonoProveedor',$vcodigoProvincia)";
			
			if (mysqli_query($conexion,$query))
			{
				mysqli_close($conexion);
				
				echo '<script languaje="javascript">';
				echo 'alert("Datos del Proveedor ingresados exitosamente!!!");';
				echo 'window.location.href="proveedores.php";';
				echo '</script>';
			}
			else{
				
				mysqli_close($conexion);
				
				echo '<script languaje="javascript">';
				echo 'alert("No se registraron datos del Proveedor en la base de datos, por error en la ejecucion del query!!!");';
				echo 'window.location.href="proveedores.php";';
				echo '</script>';
			}
			
			
		}
	?>
	
	<?php include "include/header.php"; ?>
	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="mt-4"> Crear un Proveedor </h2>
					
					<hr>
					
					<form action="" method="post">
						<div class="form-group">
							<label for="cedula">Cédula</label>
							<input type="text" name="cedulaProveedor" id="cedulaProveedor" class="form-control">						
						</div>
						
						
						<div class="form-group">
							<label for="nombreProveedor">Nombre Proveedor</label>
							<input type="text" name="nombreProveedor" id="nombreProveedor" class="form-control">						
						</div>
						
						<div class="form-group">
							<label for="telefonoProveedor">Teléfono Proveedor </label>
							<input type="text" name="telefonoProveedor" id="telefonoProveedor" class="form-control">						
						</div>
						
					
						<br><br>
						
						<div class="form-group">
							<label for="provincia">Seleccione la provincia</label>  <br>
							<select name="codigoProvincia"> 
								<option value="1">San José </option>
								<option value="2">Alajuela </option>
								<option value="3">Cartago</option>
								<option value="4">Heredia</option>
								<option value="5">Guanacaste</option>
								<option value="6">Puntarenas</option>
								<option value="7">Limón</option>
							</select>
						
						</div>
						
						<br><br>
						<div class="form-group">
							<input type="submit" name="Registrar" value="Registrar" class="btn btn-danger">
							<input type="reset"  name="limpiar"   value="Limpiar"  class="btn btn-warning">
							
							<a class="btn btn-info" href="proveedores.php">Regresar al Inicio </a>
						
						</div>
						
					</form>
				</div>
			</div>
		
		</div>
	
	
	<?php include "include/footer.php"; ?>