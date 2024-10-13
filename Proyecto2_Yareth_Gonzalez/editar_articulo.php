<?php

	if (isset($_POST['Actualizar'])) 
	{
		$vnombreviejo=$_POST['nombreviejo'];
		$vnombreArticulo=$_POST['nombreArticulo'];
		$vfecha=$_POST['fecha'];
		$vdescripcionarticulo=$_POST['descripcionarticulo'];
		$vcantidadExistencia=$_POST['cantidadExistencia'];
		$vprecioArticulo=$_POST['precioArticulo'];
		
	  
		include "include/conexion.php";
		
		$query = "UPDATE tbl_articulos SET nombreArticulo='$vnombreArticulo',fecha='$vfecha',descripcionarticulo='$vdescripcionarticulo',cantidadExistencia=$vcantidadExistencia,precioArticulo=$vprecioArticulo where nombreArticulo='$vnombreviejo'";

		
		if(mysqli_query($conexion, $query))
		{
			mysqli_close($conexion);
			echo '<script language="javascript">';
			echo 'alert("Registro actualizado exitosamente");';
			echo 'window.location="articulos.php";';
			echo '</script>';
		
		} 
		else
		{
			mysqli_close($conexion);
			echo '<script language="javascript">';
			echo 'alert("Error en proceso de actualizacion de registro!");';
			echo 'window.location="articulos.php";';
			echo '</script>';
		}  
		
	  }


      
	  if ($_REQUEST['pcodigo'] !=null)
	  {
		  	include "include/conexion.php";
							
			$valornombre=$_REQUEST['pcodigo'];  
							
									
			$consulta = mysqli_query($conexion,"select * from tbl_articulos where codigo=$valornombre");
			
			while($registro = mysqli_fetch_array($consulta))
			{
				$fnombreArticulo=$registro['nombreArticulo'];
				$ffecha=$registro['fecha'];
				$fdesripcionarticulo=$registro['descripcionarticulo'];
				$fcantidadExistencia=$registro['cantidadExistencia'];
				$fprecioArticulo=$registro['precioArticulo'];
				$fcodigoMarca=$registro['codigoMarca'];
			}
			
			mysqli_close($conexion);
		  
	  }

	  include "include/header.php"; 



		
	?>
<div class="container">
			<div class="row">
				<div class="col-md-12">
				
					<h2 class="mt-4">Editar datos de el artículo <?php  echo $fnombreArticulo?> </h2>
					<hr>
					<form action="" method="post">
						<div class="form-group">
							<label for="nombreArticulo">Nombre Artículo </label>
							<input type="text" name="nombreArticulo" id="nombreArticulo"  value="<?php echo $fnombreArticulo?>" class="form-control">
						</div>
								
						<div class="form-group">
							<label for="fecha">Fecha</label>
							<input type="date" name="fecha" id="fecha"  value="<?php  echo $ffecha ?>" class="form-control">
						</div>
						
						<div class="form-group">
							<label for="descripcionarticulo">Descripcion Artículo</label>
							<input type="text" name="descripcionarticulo" id="descripcionarticulo"  rows="4" cols="50" value="<?php  echo $fdesripcionarticulo ?>" class="form-control">
						</div>
						
						<div class="form-group">
							<label for="cantidadExistencia">Cantidad Existencia</label>
							<input type="text" name="cantidadExistencia" id="cantidadExistencia"  <?php  echo $fcantidadExistencia ?>" class="form-control">
						</div>
						<div class="form-group">
							<label for="precioArticulo">Precio Artículo</label>
							<input type="text" name="precioArticulo" id="precioArticulo"  <?php  echo $fprecioArticulo ?>" class="form-control">
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
						
								
								
						<br> <br>
							
								
								
						<div class="form-group">
							<input type="hidden" name="nombreviejo" id="nombreviejo"  value="<?php echo $fnombreArticulo ?>" class="form-control">
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