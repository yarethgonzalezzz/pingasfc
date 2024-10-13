
<?php
	
	//utilizó el script con inner join
	$query="select a.codigo,a.cedula,a.nombre, a.correo, a.codigocurso,c.codigo as codigocurso, c.curso from tbl_alumnos as a INNER JOIN tbl_cursos as c ON c.codigo=a.codigocurso order by a.cedula asc";
	$tipo_consulta=1;
	
	
	if (isset($_POST['cedula']))
	{
		$vcedula=$_POST['cedula'];
		
		
		$query="select a.codigo,a.cedula,a.nombre, a.correo, a.codigocurso,c.codigo as codigocurso, c.curso from tbl_alumnos as a INNER JOIN tbl_cursos as c ON c.codigo=a.codigocurso where a.cedula=$vcedula order by a.cedula asc";
		$tipo_consulta=2;
		
	
	}
	
	if (isset($_POST['cedula']) && $_POST['cedula'] == null)
	{
		$query="select a.codigo,a.cedula,a.nombre, a.correo, a.codigocurso,c.codigo as codigocurso, c.curso from tbl_alumnos as a INNER JOIN tbl_cursos as c ON c.codigo=a.codigocurso order by a.cedula asc";
		$tipo_consulta=1;
	}
	

?>




<?php include "include/header.php"; ?>



	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="alumno.php" class="btn btn-primary mt-4"> Crear Alumno  </a>
				
				
				<hr>
				
				<form class="form-inline" method="post">
					<div class="form-group mr-3">
						<input type="text" id="cedula" name="cedula" placeholder="Buscar por cedula" class="form-control">
					</div>
					
					<button type="submit" name="submit" class="btn btn-warning">Ver Resultados </button>
				</form>
			</div>
		</div>
	</div>
	
	
	


	
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mt-3"> Listado de Estudiantes </h2>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Codigo</th>
							<th>Cedula</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Curso</th>
							<th>Acciones</th>
						</tr>
					
					</thead>
					
					<tbody>
						<?php
							include "include/conexion.php";
							
							//$tildes=$conexion->query("SET NAMES 'UTF-8'");
							
							if ($query=mysqli_query($conexion,$query))
							{
								$contador=0;
								
								for ($i=0; $i < $query->num_rows; $i++)
								{
									echo "<tr>";
										mysqli_data_seek($query,$i);
										$extraer=mysqli_fetch_array($query);
										
										$contador=$i+1;
										
										echo "<td>" . $contador . "</td>";
										echo "<td>" . $extraer['codigo'] . "</td>";
										echo "<td>" . $extraer['cedula'] . "</td>";
										echo "<td>" . $extraer['nombre'] . "</td>";
										echo "<td>" . $extraer['correo'] . "</td>";
										echo "<td>" . $extraer['curso'] . "</td>";
										
										/* esto ya no es necesario porq utilice en el script el inner join
										if ($extraer['codigocurso'] == 1)
											
											echo "<td> Programacion 1 </td>";
										
										else if ($extraer['codigocurso'] == 2)
											echo "<td> Matematica </td>";
										
										else if ($extraer['codigocurso'] == 3)
											echo "<td> Contabilidad </td>";
										
										else if ($extraer['codigocurso'] == 4)
											echo "<td> Administracion </td>";*/
										
										
										echo "<td>";
										echo "<a href=\"editar.php?pcedula=$extraer[cedula]\">✏️ Editar </a>";
										echo "<a href=\"borrar.php?pcedula=$extraer[cedula]\" ?valor=onclick=\"return confirmar('Esta seguro')\">🗑️ Borrar </a>";
																			
										
										
										echo "</td>";
										
									echo "</tr>";
									
								}	
								
								
								if ($contador == 0)
								{
									echo '<script languaje="javascript">';
									echo 'alert("No hay datos asociados a ese numero de cedula");';
									echo 'window.location="estudiantes.php";';
									echo '</script>';
								}			
								
								
								
							}

							
						
						?>
					
					</tbody>
					
					
					<tfoot align="right">
						<tr>
							<th colspan="7">
								<?php
									mysqli_free_result($query); //liberar de la memoria el query anterior
								
									//preparar query
									
									if ($tipo_consulta==1)
										$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_alumnos") or die("Problemas para ejecutar el query ". mysqli_error($conexion));
									
									
									else if($tipo_consulta==2)
										$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_alumnos where cedula=$vcedula") or die("Problemas para ejecutar el query ". mysqli_error($conexion));
									
									//ejecutar el query
									$reg=mysqli_fetch_array($registro);
									
									//presentamos los datos de la nueva consulta que se guardo en el vector asociativo
									echo "<br> La cantidad de alumnos inscriptos es: " . $reg['cantidad'];
									
									mysqli_close($conexion); 		
								?>
							
							</th>
						</tr>
					</tfoot>
				
				</table>
			</div>
		</div>
	</div>


<?php include "include/fooder.php"; ?>