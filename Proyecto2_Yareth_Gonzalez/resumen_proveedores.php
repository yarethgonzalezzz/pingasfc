<?php include "include/header.php"; ?>

  <div class="container">
    <div class="row">
      <div class="jumbotron">
       
		<p>
			<h3> Resumen Datos Tabla Proveedores </h3>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						
						<th>Provincias</th>
						<th>Cantidad Provincias</th>
					</tr>
				</thead>
					
				<tbody>
				
					<?php
						include("include/conexion.php");
						
						$registros=mysqli_query($conexion,"select c.nombreArticulo,count(a.cedulaProveedor) as cantidad from tbl_proveedores as a INNER JOIN tbl_provincias as c ON c.codigoProvincia=a.codigoProvincia group by a.codigoProvincia order by c.nombreArticulo asc") or die("Problemas para ejecutar el Query" . mysqli_error($conexion));
						
						$i=1;
						
						while ($reg=mysqli_fetch_array($registros))
						{
							echo "<tr>";
							echo "<td> $i </td>";
							
							echo "<td>". $reg['nombreArticulo'].  "</td>";
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