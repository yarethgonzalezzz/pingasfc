
	<?php
		if (!empty($_POST['Registrar']))
		{
				include("include/conexion.php");
			
				if ($_POST['cedula'] != null)
				{
					$vcedula=$_POST['cedula'];
					$vnombre=$_POST['nombre'];
					$vprovincia=$_REQUEST['provincia'];
					$vinformacion=$_REQUEST['informacion'];
					
					$query="insert into tbl_informacion(cedula,nombre,codigoprovincia,descripcion) values ($vcedula,'$vnombre',$vprovincia,'$vinformacion')";
					
					
					if (mysqli_query($conexion,$query))
					{
						mysqli_close($conexion);
						
						echo '<script languaje="javascript">';
						echo 'alert("Datos de la Infomacion ingresada exitosamente: ");';
						echo 'window.location.href = "index.php";';
						echo '</script>';
						
						
					}
					else{
					
						mysqli_close($conexion);
						echo '<script languaje="javascript">';
						echo 'alert("No se guardaron los datos de la informacion, error al ejecutar el Query...!");';
						echo 'window.location.href = "index.php";';
						echo '</script>';
					
					}
				}
				else{
					echo '<script languaje="javascript">';
					echo 'alert("Debe registrar datos en el formulario...!");';
				
					echo '</script>';
				}
			
			
		}
	?>




	<?php include 'include/header.php'; ?>

	

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mt-4">Crear Informacion de Contactenos</h2>
				<hr>
				<form method="post">
				
					
					<div class="form-group">
						<label for="nombre">Cedula</label>
						<input type="text" name="cedula" id="cedula" class="form-control">
					</div>
			
										
					<div class="form-group">
						<label for="email">Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control">
					</div>
					
										
					
					<br> <br>
					
										
					<div class="form-group">
						<label>Seleccione la provincia: </label>
						<select name="provincia">
							<?php
								include("include/conexion.php");
								$registros=mysqli_query($conexion,"select * from tbl_provincia") or die("Problemas al ejecutar el query ".mysqli_error($conexion));
								
								while ($reg=mysqli_fetch_array($registros))
								{
									echo "<option value=\"$reg[codigo]\"> $reg[provincia] </option>";
								}
								
								mysqli_close($conexion);
												 
							?>
					
						</select>
					
					</div>
					
					<br> <br>
					
					<div class="form-group">
						<label for="email">Descripción de consulta</label>
						<textarea name="informacion" id="informacion"  rows="4" cols="50" class="form-control"> </textarea>
					</div>
					
					
					<br> <br>
					<div class="form-group">
						
						<input type="submit" name="Registrar" class="btn btn-primary" value="Registrar">
						<input type="reset" name="limpiar" class="btn btn-warning" value="Limpiar">
						<a class="btn btn-info" href="index.php" role="button">Regresar al inicio</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include "include/fooder.php"; ?>