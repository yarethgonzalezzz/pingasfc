<?php include "include/header.php"; ?>




  <div class="container">
    <div class="row">
      <div class="jumbotron">
       
		<p>
			<h3> Resumen Datos Tabla Artículos </h3>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						
						<th>Nombre Artículo</th>
						<th>Cantidad Artículos</th>
					</tr>
				</thead>
					
				<tbody>
				
					<?php
						include("include/conexion.php");
						
				$registros = mysqli_query($conexion, "SELECT c.nombreMarca, COUNT(a.nombreArticulo) AS cantidad FROM tbl_articulos AS a INNER JOIN tbl_marcas AS c ON c.codigoProveedor = a.codigoMarca GROUP BY c.nombreMarca ORDER BY c.nombreMarca ASC") or die("Problemas para ejecutar el Query: " . mysqli_error($conexion));
						
						$i=1;
						
						while ($reg=mysqli_fetch_array($registros))
						{
							echo "<tr>";
							echo "<td> $i </td>";
							
							echo "<td>". $reg['nombreMarca'].  "</td>";
							echo "<td>". $reg['cantidad']. "</td>";
							echo "</tr>";
							$i++;
						
						}
						
						mysqli_close($conexion);
					?>
		
		
		
				</tbody>
			</table>
		</p>
      
      </div>
    </div>
	
	<a class="btn btn-info" href="index.php">Regresar al inicio</a>
  </div> 

	
<?php include "include/footer.php"; ?>