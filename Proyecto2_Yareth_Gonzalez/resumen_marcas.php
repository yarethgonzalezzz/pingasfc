<?php include "include/header.php"; ?>




  <div class="container">
    <div class="row">
      <div class="jumbotron">
       
		<p>
			<h3> Resumen Datos Tabla Marcas </h3>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						
						<th>Marcas</th>
						<th>Cantidad Marcas</th>
					</tr>
				</thead>
					
				<tbody>
				
					<?php
						include("include/conexion.php");
						
				$registros = mysqli_query($conexion, "SELECT c.nombreProveedor, COUNT(a.nombreMarca) AS cantidad FROM tbl_marcas AS a INNER JOIN tbl_proveedores AS c ON c.codigoProvincia = a.codigoProveedor GROUP BY c.nombreProveedor ORDER BY c.nombreProveedor ASC") or die("Problemas para ejecutar el Query: " . mysqli_error($conexion));
						
						$i=1;
						
						while ($reg=mysqli_fetch_array($registros))
						{
							echo "<tr>";
							echo "<td> $i </td>";
							
							echo "<td>". $reg['nombreProveedor'].  "</td>";
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