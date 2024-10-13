<?php

		if (!empty($_POST['Registrar']))
		{
			include "include/conexion.php";
			$fecha = date('Y-m-d'); 

			
			$vnombreArticulo=$_POST['nombreArticulo'];
			$vfecha=$_POST['fecha'];
			$vdescripcionarticulo=$_POST['descripcionarticulo'];
			$vcantidadExistencia=$_POST['cantidadExistencia'];
			$vprecioArticulo=$_POST['precioArticulo'];
			$vcodigoMarca=$_POST['codigo'];
			
			
			$query="insert into tbl_articulos(nombreArticulo,fecha,descripcionarticulo, cantidadExistencia, precioArticulo,codigoMarca) values('$vnombreArticulo','$fecha','$vdescripcionarticulo',$vcantidadExistencia, $vprecioArticulo, $vcodigoMarca)";
			
			if (mysqli_query($conexion,$query))
			{
				mysqli_close($conexion);
				
				echo '<script languaje="javascript">';
				echo 'alert("Datos del articulo ingresados exitosamente!!!");';
				echo 'window.location.href="articulos.php";';
				echo '</script>';
			}
			else{
				
				mysqli_close($conexion);
				
				echo '<script languaje="javascript">';
				echo 'alert("No se registraron datos del artículo en la base de datos, por error en la ejecucion del query!!!");';
				echo 'window.location.href="articulos.php";';
				echo '</script>';
			}
			
			
		}
	?>
<?php include "include/header.php"; ?>
	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="mt-4"> Crear un artículo </h2>
					
					<hr>
					
							<form action="" method="post">
								<div class="form-group">
									<label for="nombreArticulo ">Nombre Artículo</label>
									<input type="text" name="nombreArticulo" id="nombreArticulo" class="form-control">						
								</div>
								<div class="form-group">
									<label for="fecha ">Fecha</label>
									<input type="date" name="fecha" id="fecha" class="form-control">						
								</div>
								
								
								<div class="form-group">
								<label for="email">Descripción del artículo</label>
								<textarea name="descripcionarticulo" id="descripcionarticulo"  rows="4" cols="50" class="form-control"> </textarea>
								</div>
								
								<div class="form-group">
									<label for="cantidad ">Cantidad Existencia</label>
									<input type="number" name="cantidadExistencia" id="cantidadExistencia" class="form-control">						
								</div>
								
								<div class="form-group">
									<label for="cantidad ">Precio Artículo </label>
									<input type="number" name="precioArticulo" id="precioArticulo" class="form-control">						
								</div>
								
								<div class="form-group">
									<label for="codigoMarca">Seleccione la marca</label>  <br>
									<select name="codigo"> 
										
										<?php
								include "include/conexion.php";
								$marcas = mysqli_query($conexion, "SELECT a.*, c.nombreMarca FROM tbl_marcas AS a INNER JOIN tbl_marcas AS c ON c.codigo = a.codigo GROUP BY a.codigo ORDER BY c.nombreMarca ASC") or die ("Problemas para ejecutar el query: " . mysqli_error($conexion));


								if (mysqli_num_rows($marcas) > 0) {
								
								while ($reg = mysqli_fetch_array($marcas)) {
								echo "<option value=\"$reg[codigo]\">$reg[nombreMarca]</option>";
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