
	<?php
		if (!empty($_POST['Registrar']))
		{
				
				if ($_POST['cedula'] != null)
				{
					include("include/conexion.php");
			
					$vnombre=$_POST['nombre'];
					$vcedula=$_POST['cedula'];
					$vcorreo=$_REQUEST['correo'];
					$vcurso=$_REQUEST['codigocurso'];
					
					$query="insert into tbl_alumnos(cedula,nombre,correo,codigocurso) values ($vcedula,'$vnombre','$vcorreo',$vcurso)";
					
					
					if (mysqli_query($conexion,$query))
					{
						mysqli_close($conexion);
						
						echo '<script languaje="javascript">';
						echo 'alert("Datos del Alumno ingresados exitosamente: ");';
						echo 'window.location.href = "estudiantes.php";';
						echo '</script>';
						
						
					}
					else{
					
						mysqli_close($conexion);
						echo '<script languaje="javascript">';
						echo 'alert("No se guardaron los datos en la base de datos, error al ejecutar el Query...!");';
						echo 'window.location.href = "estudiantes.php";';
						echo '</script>';
					
					}
					
					//header("Location: index.php");
					
				}
				else{
					mysqli_close($conexion);
					echo '<script languaje="javascript">';
					echo 'alert("Debe ingresar datos en el formulario.!");';
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
						<label for="cedula">Cedula</label>
						<input type="text" name="cedula" id="cedula" class="form-control">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control">
					</div>
			
										
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="correo" id="correo" class="form-control">
					</div>
			
					
					
					<br> <br>
					
					<!--  Ya no lo realizo de esta forma ya que primero hago una consulta a la tabla de tbl_cursos y 
					      extraigo su información 
					<div class="form-group">
						<label>Seleccione el Curso: </label>
						<select name="codigocurso">
						<option value="1">Programacion 1 </option>
						<option value="2">Matematica </option>
						<option value="3">Contabilidad</option>
						<option value="4">Administracion</option>
					</select>
					
					</div>-->
					
					<div class="form-group">
						<label>Seleccione el Curso: </label>
						<select name="codigocurso">
									
							<?php
								include("include/conexion.php");
								$registros=mysqli_query($conexion,"select * from tbl_cursos") or die("Problemas al ejecutar el query ".mysqli_error($conexion));
								
								while ($reg=mysqli_fetch_array($registros))
								{
									echo "<option value=\"$reg[codigo]\"> $reg[curso] </option>";
								}
								
								mysqli_close($conexion);
												 
							?>
					
						</select>
					
					</div>
					
					
					
					
					
					
					<br> <br>
					<div class="form-group">
						
						<input type="submit" name="Registrar" class="btn btn-primary" value="Registrar">
						<input type="reset" name="limpiar" class="btn btn-warning" value="Limpiar">
						<a class="btn btn-info" href="estudiantes.php" role="button">Regresar al inicio</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include "include/fooder.php"; ?>