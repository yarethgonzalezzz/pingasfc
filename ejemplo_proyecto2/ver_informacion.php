
<?php
	
	//utilizó el script con inner join
	$query="select a.codigo,a.cedula,a.nombre, a.codigoprovincia, a.descripcion,c.codigo,c.provincia from tbl_informacion as a INNER JOIN tbl_provincia as c ON c.codigo=a.codigoprovincia order by a.cedula asc";
	$tipo_consulta=1;
	
	
	if (isset($_POST['cedula']))
	{
		$vcedula=$_POST['cedula'];
		
		$query="select a.codigo,a.cedula,a.nombre, a.codigoprovincia, a.descripcion,c.codigo,c.provincia from tbl_informacion as a INNER JOIN tbl_provincia as c ON c.codigo=a.codigoprovincia where a.cedula=$vcedula order by a.cedula asc";
		$tipo_consulta=2;
		
	
	}
	
	if (isset($_POST['cedula']) && $_POST['cedula'] == null)
	{
		$query="select a.codigo,a.cedula,a.nombre, a.codigoprovincia, a.descripcion,c.codigo,c.provincia from tbl_informacion as a INNER JOIN tbl_provincia as c ON c.codigo=a.codigoprovincia order by a.cedula asc";
		$tipo_consulta=1;
	}
	

?>




<?php include "include/header.php"; ?>



	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="crear_informacion.php" class="btn btn-primary mt-4"> Crear Informacion  </a>
				
				
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
							<th>Provincia</th>
							<th>Informacion</th>
						
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
										echo "<td>" . $extraer['provincia'] . "</td>";
										echo "<td>" . $extraer['descripcion'] . "</td>";
										
									echo "</tr>";
									
								}	
								
								
								if ($contador == 0)
								{
									echo '<script languaje="javascript">';
									echo 'alert("No hay datos asociados a ese numero de cedula");';
									echo 'window.location="index.php";';
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
										$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_informacion") or die("Problemas para ejecutar el query ". mysqli_error($conexion));
									
									
									else if($tipo_consulta==2)
										$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_informacion where cedula=$vcedula") or die("Problemas para ejecutar el query ". mysqli_error($conexion));
									
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