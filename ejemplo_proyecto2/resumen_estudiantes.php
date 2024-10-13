<?php include "include/header.php"; ?>




  <!-- Sección Jumbotron -->
  <div class="container">
    <div class="row">
      <div class="jumbotron">
       
		<p>
			<h3> Resumen Datos Tabla Cursos y Estudiantes </h3>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Codigo</th>
						<th>Curso</th>
						<th>Cantidad</th>
					</tr>
				</thead>
					
				<tbody>
				
					<?php
						include("include/conexion.php");
						
						$registros=mysqli_query($conexion,"select a.codigocurso,count(a.cedula) as cantidad,c.codigo, c.curso from tbl_alumnos  as a INNER JOIN tbl_cursos as c ON c.codigo =a.codigocurso group by c.codigo order by c.curso") or die("Problemas para ejecutar el Query".mysqli_error($conexion));
						
						$i=1;
						
						while ($reg=mysqli_fetch_array($registros))
						{
							echo "<tr>";
							echo "<td> $i </td>";
							echo "<td>". $reg['codigo'].  "</td>";
							echo "<td>". $reg['curso'].  "</td>";
							echo "<td>". $reg['cantidad']. "</td>";
							echo "</tr>";
							$i++;
						
						}
						
						mysqli_close($conexion);
					?>
		
		
		
				</tbody>
			</table>
		</p>
      
      </div><!-- Fin Sección Jumbotron -->
    </div>
	
	<a class="btn btn-info" href="index.php">Regresar al inicio</a>
  </div> <!-- Fin Sección container -->

	
<?php include "include/fooder.php"; ?>