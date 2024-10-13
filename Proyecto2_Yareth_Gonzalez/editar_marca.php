<?php

	if (isset($_POST['Actualizar'])) 
	{
		$vnombreviejo=$_POST['nombreviejo'];
		$vnombreMarca=$_POST['nombreMarca'];
		$vdescripcionMarca=$_POST['descripcionMarca'];
		$vcodigoProveedor=$_POST['codigoProveedor'];
	  
		include "include/conexion.php";
		
		$query = "UPDATE tbl_marcas SET nombreMarca='$vnombreMarca',descripcionMarca='$vdescripcionMarca',codigoProveedor=$vcodigoProveedor where nombreMarca=$vnombreviejo";
		
		if(mysqli_query($conexion, $query))
		{
			mysqli_close($conexion);
			echo '<script language="javascript">';
			echo 'alert("Registro actualizado exitosamente");';
			echo 'window.location="marcas.php";';
			echo '</script>';
		
		} 
		else
		{
			mysqli_close($conexion);
			echo '<script language="javascript">';
			echo 'alert("Error en proceso de actualizacion de registro!");';
			echo 'window.location="marcas.php";';
			echo '</script>';
		}  
		
	  }


      
	  if ($_REQUEST['pcodigo'] !=null)
	  {
		  	include "include/conexion.php";
							
			$valornombre=$_REQUEST['pcodigo'];  
							
									
			$consulta = mysqli_query($conexion,"select * from tbl_marcas where codigo=$valornombre");
			
			while($registro = mysqli_fetch_array($consulta))
			{
				$fnombreMarca=$registro['nombreMarca'];
				$fdesripcionMarca=$registro['descripcionMarca'];
				$fcodigoProveedor=$registro['codigoProveedor'];
			}
			
			mysqli_close($conexion);
		  
	  }

	  include "include/header.php"; 



		
	?>
<div class="container">
			<div class="row">
				<div class="col-md-12">
				
					<h2 class="mt-4">Editar datos de la marca<?php  echo $fnombreMarca?> </h2>
					<hr>
					<form action="" method="post">
						<div class="form-group">
							<label for="nombreMarca">Nombre Marca </label>
							<input type="text" name="nombreMarca" id="nombreMarca"  value="<?php echo $fnombreMarca?>" class="form-control">
						</div>
								
						<div class="form-group">
							<label for="descripcionMarca">Descripción Marca</label>
							<input type="text" name="descripcionMarca" id="descripcionMarca"  value="<?php  echo $fdesripcionMarca ?>" class="form-control">
						</div>
						
						
						<div class="form-group">
									<label for="codigoMarca">Seleccione la marca</label>  <br>
									<select name="codigo"> 
										
										<?php
								include "include/conexion.php";


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