
<?php
	
	//utilizó el script con inner join
	$query="select a.codigo,a.curso,a.descripcion, a.codigocarrera,c.codigo as codigocarrera, c.carrera from tbl_cursos as a INNER JOIN tbl_carreras as c ON c.codigo=a.codigocarrera order by a.curso asc";
	
	$tipo_consulta=1;
	
	if (isset($_POST['fcurso']))
	{
		$vcurso=$_POST['fcurso'];
		
		$query="select a.codigo,a.curso,a.descripcion, a.codigocarrera,c.codigo as codigocarrera, c.carrera from tbl_cursos as a INNER JOIN tbl_carreras as c ON c.codigo=a.codigocarrera where a.curso = '$vcurso' order by a.curso asc";
		
		$tipo_consulta=2;
		
	}
	
	if (isset($_POST['fcurso']) && $_POST['fcurso'] == null)
	{
		$query="select a.codigo,a.curso,a.descripcion, a.codigocarrera,c.codigo as codigocarrera, c.carrera from tbl_cursos as a INNER JOIN tbl_carreras as c ON c.codigo=a.codigocarrera order by a.curso asc";
		$tipo_consulta=1;
		
	}
	

?>




<?php include "include/header.php"; ?>



	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="crear_curso.php" class="btn btn-primary mt-4"> Crear Curso  </a>
				
				
				<hr>
				
				<form class="form-inline" method="post">
					<div class="form-group mr-3">
						<input type="text" id="fcurso" name="fcurso" placeholder="Buscar por Curso" class="form-control">
					</div>
					
					<button type="submit" name="submit" class="btn btn-warning">Ver Resultados </button>
				</form>
			</div>
		</div>
	</div>
	
	
	


	
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mt-3"> Listado de Cursos</h2>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Codigo</th>
							<th>Curso</th>
							<th>Descripción</th>
							<th>Carrera</th>
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
										echo "<td>" . $extraer['curso'] . "</td>";
										echo "<td>" . $extraer['descripcion'] . "</td>";
										echo "<td>" . $extraer['carrera'] . "</td>";
											
										echo "<td>";
										echo "<a href=\"editar_cursoREALIZARLO.php?pcurso=$extraer[curso]\">✏️ Editar </a>";
										echo "<a href=\"borrar_cursoREALIZARLO.php?pcurso=$extraer[curso]\" ?valor=onclick=\"return confirmar('Esta seguro')\">🗑️ Borrar </a>";
																			
										
										
										echo "</td>";
										
									echo "</tr>";
									
								}	
								
								
								if ($contador == 0)
								{
									echo '<script languaje="javascript">';
									echo 'alert("No hay datos asociados a este curso");';
									echo 'window.location="inicio_cursos.php";';
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
									
										$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_cursos") or die("Problemas para ejecutar el query ". mysqli_error($conexion));
									
									
									else if($tipo_consulta==2)
										$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_cursos where curso='$vcurso'") or die("Problemas para ejecutar el query ". mysqli_error($conexion));
									
									
									
									
									//ejecutar el query
									$reg=mysqli_fetch_array($registro);
									
									//presentamos los datos de la nueva consulta que se guardo en el vector asociativo
									echo "<br> La cantidad de cursos registrados es: " . $reg['cantidad'];
									
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