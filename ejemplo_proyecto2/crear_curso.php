
	<?php
		if (!empty($_POST['Registrar']))
		{
				include("include/conexion.php");
			
				if ($_POST['curso'] != null)
				{
					$vcurso=$_POST['curso'];
					$vdescripcion=$_POST['descripcion'];
					$vcarrera=$_REQUEST['codigocarrera'];
					
					$query="insert into tbl_cursos(curso,descripcion,codigocarrera) values ('$vcurso','$vdescripcion',$vcarrera)";
					
					
					if (mysqli_query($conexion,$query))
					{
						mysqli_close($conexion);
						
						echo '<script languaje="javascript">';
						echo 'alert("Datos del Curso ingresados exitosamente: ");';
						echo 'window.location.href = "inicio_cursos.php";';
						echo '</script>';
						
						
					}
					else{
					
						mysqli_close($conexion);
						echo '<script languaje="javascript">';
						echo 'alert("No se guardaron los datos del curso en la base de datos, error al ejecutar el Query...!");';
						echo 'window.location.href = "inicio_cursos.php";';
						echo '</script>';
					
					}
				}
				else{
					echo '<script languaje="javascript">';
					echo 'alert("Debe registrar datos en el formulario...!");';
					//echo 'window.location.href = "inicio_cursos.php";';
					echo '</script>';
				}
			
			
		}
	?>




	<?php include 'include/header.php'; ?>

	

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mt-4">Crear un alumno</h2>
				<hr>
				<form method="post">
				
					
					<div class="form-group">
						<label for="nombre">Curso</label>
						<input type="text" name="curso" id="curso" class="form-control">
					</div>
			
										
					<div class="form-group">
						<label for="email">Descripcion</label>
						<input type="text" name="descripcion" id="descripcion" class="form-control">
					</div>
			
					
					
					<br> <br>
					
										
					<div class="form-group">
						<label>Seleccione la carrera: </label>
						<select name="codigocarrera">
									
							<?php
								include("include/conexion.php");
								$registros=mysqli_query($conexion,"select * from tbl_carreras") or die("Problemas al ejecutar el query ".mysqli_error($conexion));
								
								while ($reg=mysqli_fetch_array($registros))
								{
									echo "<option value=\"$reg[codigo]\"> $reg[carrera] </option>";
								}
								
								mysqli_close($conexion);
												 
							?>
					
						</select>
					
					</div>
					
					
					
					
					
					
					<br> <br>
					<div class="form-group">
						
						<input type="submit" name="Registrar" class="btn btn-primary" value="Registrar">
						<input type="reset" name="limpiar" class="btn btn-warning" value="Limpiar">
						<a class="btn btn-info" href="inicio_cursos.php" role="button">Regresar al inicio</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include "include/fooder.php"; ?>