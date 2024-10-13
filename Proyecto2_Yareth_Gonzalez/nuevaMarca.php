<?php

		if (!empty($_POST['Registrar']))
		{
			include "include/conexion.php";
			
			$vnombreMarca=$_POST['nombreMarca'];
			$vdescripcionMarca=$_POST['descripcionMarca'];
			$vcodigoProveedor=$_POST['codigo'];
			
			
			$query="insert into tbl_marcas(nombreMarca,descripcionMarca,codigoProveedor) values('$vnombreMarca','$vdescripcionMarca',$vcodigoProveedor)";
			
			if (mysqli_query($conexion,$query))
			{
				mysqli_close($conexion);
				
				echo '<script languaje="javascript">';
				echo 'alert("Datos de la marca ingresados exitosamente!!!");';
				echo 'window.location.href="marcas.php";';
				echo '</script>';
			}
			else{
				
				mysqli_close($conexion);
				
				echo '<script languaje="javascript">';
				echo 'alert("No se registraron datos de la marca en la base de datos, por error en la ejecucion del query!!!");';
				echo 'window.location.href="marcas.php";';
				echo '</script>';
			}
			
			
		}
	?>

<?php include "include/header.php"; ?>
	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="mt-4"> Crear una Marca </h2>
					
					<hr>
					
							<form action="" method="post">
								<div class="form-group">
									<label for="nombreMarca ">Nombre Marca</label>
									<input type="text" name="nombreMarca" id="nombreMarca" class="form-control">						
								</div>
								
								
								<div class="form-group">
								<label for="email">Descripción de la marca</label>
								<textarea name="descripcionMarca" id="descripcionMarca"  rows="4" cols="50" class="form-control"> </textarea>
								</div>
								
								<div class="form-group">
									<label for="codigoProveedor">Seleccione la marca</label>  <br>
									<select name="codigo"> 
										
										<?php
							include "include/conexion.php";
							$proveedores = mysqli_query($conexion, "SELECT a.*, c.nombreProveedor FROM tbl_proveedores AS a INNER JOIN tbl_proveedores AS c ON c.codigo = a.codigo GROUP BY a.codigo ORDER BY c.nombreProveedor ASC") or die ("Problemas para ejecutar el query: " . mysqli_error($conexion));


							if (mysqli_num_rows($proveedores) > 0) {
							
							while ($reg = mysqli_fetch_array($proveedores)) {
							echo "<option value=\"$reg[codigo]\">$reg[nombreProveedor]</option>";
							}
							} else {
							echo "No se encontraron marcas.";
							}

							mysqli_close($conexion);
							?>
								
								
								
							</select>
						
						</div>
						
						
						<br><br>
						<div class="form-group">
							<input type="submit" name="Registrar" value="Registrar" class="btn btn-danger">
							<input type="reset"  name="limpiar"   value="Limpiar"  class="btn btn-warning">
							
							<a class="btn btn-info" href="marcas.php">Regresar al Inicio </a>
						
						</div>
						
					</form>
				</div>
			</div>
		
		</div>
	
	
	<?php include "include/footer.php"; ?>