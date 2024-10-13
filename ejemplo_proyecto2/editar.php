<?php

	if (isset($_POST['Actualizar'])) 
	{
		$vcedulavieja=$_POST['cedulavieja'];
		$vcedula=$_POST['cedula'];
		$vnombre=$_POST['nombre'];
		$vcorreo=$_POST['correo'];
		$vcodigocurso=$_POST['codigocurso'];
	  
		include "include/conexion.php";
		
		$query = "UPDATE tbl_alumnos SET cedula=$vcedula,nombre='$vnombre',correo='$vcorreo',codigocurso=$vcodigocurso where cedula=$vcedulavieja";
		
		if(mysqli_query($conexion, $query))
		{
			echo '<script language="javascript">';
			echo 'alert("Registro actualizado exitosamente");';
			echo 'window.location="estudiantes.php";';  //ya no lo devuelvo a la pagina index sino que a la pagina estudiantes
			echo '</script>';
		
		} 
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Error en proceso de actualizacion de registro!");';
			echo 'window.location="estudiantes.php";';
			echo '</script>';
		}  
		
	  }


      //pcedula es el parametro que viene de la pagina index.php
	  if ($_REQUEST['pcedula'] !=null)
	  {
		  	include "include/conexion.php";
							
			$valorcedula=$_REQUEST['pcedula'];  //paso el valor que viene en el parametro pcedula a la variable vcedula
							
									
			$consulta = mysqli_query($conexion,"select * from tbl_alumnos where cedula=$valorcedula");
			
			while($registro = mysqli_fetch_array($consulta))
			{
				$fcedula=$registro['cedula'];
				$fnombre=$registro['nombre'];
				$fcorreo=$registro['correo'];
				$fcodigocurso=$registro['codigocurso'];
			}
		  
	  }

	  include "include/header.php"; 



		
	?>



	<div class="container">
			<div class="row">
				<div class="col-md-12">
				
					<h2 class="mt-4">Editando Datos del Alumno: <?php  echo $fnombre ?> </h2>
					<hr>
					<form method="post">
						<div class="form-group">
							<label for="cedula">Cedula</label>
							<input type="text" name="cedula" id="cedula"  value="<?php echo $fcedula ?>" class="form-control">
						</div>
								
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre"  value="<?php  echo $fnombre ?>" class="form-control">
						</div>
						
													
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="correo" id="correo" value="<?php  echo  $fcorreo ?>" class="form-control">
						</div>
						
								
								
						<br> <br>
							
						<div class="form-group">
							<label for="curso">Seleccione el Curso: </label>
							<!-- Ya no lo realizó de esta forma porque estoy utilizando la consulta de la tabla tbl_cursos
							
							<select name="codigocurso">
								<option value="1" <?php if ($fcodigocurso == 1) echo "selected"; ?> >Programacion 1 </option>
								<option value="2" <?php if ($fcodigocurso == 2) echo "selected"; ?> >Matematica </option>
								<option value="3" <?php if ($fcodigocurso == 3) echo "selected"; ?> >Contabilidad</option>
								<option value="4" <?php if ($fcodigocurso == 4) echo "selected"; ?> >Administracion</option>
							</select> -->
							
							<select name="codigocurso">
									
							<?php
								include("include/conexion.php");
								$registros=mysqli_query($conexion,"select * from tbl_cursos") or die("Problemas al ejecutar el query ".mysqli_error($conexion));
								
								while ($reg=mysqli_fetch_array($registros))
								{
									if ($fcodigocurso == $reg['codigo'])
										echo "<option value=\"$reg[codigo]\" selected>$reg[curso]</option>";
									else
										echo "<option value=\"$reg[codigo]\">$reg[curso]</option>";
								}
								
								mysqli_close($conexion);
												 
							?>
					
						</select>
								
						</div>
								
								
						<div class="form-group">
							<input type="hidden" name="cedulavieja" id="cedulavieja"  value="<?php echo $fcedula ?>" class="form-control">
						</div>
								
						<br> <br>
						<div class="form-group">
							
							<input type="submit" name="Actualizar" class="btn btn-primary" value="Actualizar">
							<a class="btn btn-info" href="index.php">Regresar al inicio</a>
						</div>
						
							
					</form>
				</div>
			</div>
		</div>



	<?php include "include/fooder.php"; ?>