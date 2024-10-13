<?php
	$query="select * from tbl_proveedores";
	
	
									
		

	if (isset($_POST['cedula']))
	{
		$vcedula=$_POST['cedula'];
		$query="select * from tbl_proveedores where cedula=$vcedula";
		
									
	
	}
	
	if (isset($_POST['cedula']) && $_POST['cedula'] == null)
	{
		$query="select * from tbl_proveedores";
		
		
									
		
	}
?>
<?php include "include/header.php"; ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="nuevoProveedor.php" class="btn btn-warning mt-4"> | Crear Proveedor | </a>
				
				<hr>
				
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mt-3"> Listado de Proveedores </h2>
				
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Codigo</th>
							<th>Cedula</th>
							<th>Nombre Proveedor</th>
							<th>Telefono Proveedor</th>
							<th>Código Provincia</th>
							<th>Acciones</th>
						
						</tr>
					
					</thead>
					
					<tbody>
						<?php
							include "include/conexion.php";
							
							if ($query=mysqli_query($conexion,$query))
							{
								$contador=0;
								
								for ($i=0; $i< $query->num_rows; $i++)
								{
									echo "<tr>";
										mysqli_data_seek($query,$i);
										$extraer=mysqli_fetch_array($query);
										
										$contador=$i+1;
										
										echo "<td>" . $contador . "</td>";
										echo "<td>" . $extraer['codigo'] . "</td>";
										echo "<td>" . $extraer['cedulaProveedor'] . "</td>";
										echo "<td>" . $extraer['nombreProveedor'] . "</td>";
										echo "<td>" . $extraer['telefonoProveedor'] . "</td>";
										
										switch($extraer['codigoProvincia'])
										{
											case 1: $mensaje="San José"; break;
											case 2: $mensaje="Alajuela";     break;
											case 3: $mensaje="Cartago";   break;
											case 4: $mensaje="Heredia"; break;
											case 5: $mensaje="Guanacaste"; break;
											case 6: $mensaje="Puntarenas"; break;
											case 7: $mensaje="Limón"; break;
										}
									
										echo "<td>" . $mensaje . "</td>";
										
										echo "<td>";
											echo "<a href=\"editar_proveedor.php?pcedula=$extraer[cedulaProveedor]\"> ✏️ Editar </a>";
											echo "<a href=\"borrar_proveedor.php?pcedula=$extraer[cedulaProveedor]\"> 🗑️ Borrar </a>";

										
										echo "</td>";
									
									echo "</tr>";
									
								}
								
								
							} 
						
						?>
					</tbody>
					
					<tfoot align="right">
						<tr>
							<th colspan="7">
								<?php
									mysqli_free_result($query); 
									
									
									$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_proveedores") or die("Problemas para ejecutar el query " . mysqli_error($conexion));
									
									
									
									
									$reg=mysqli_fetch_array($registro);
								
									
									echo "<br> La cantidad de proveedores ingresados es: " . $reg['cantidad'];
									
									mysqli_close($conexion);
								?>
							</th>
						
						</tr>
					</tfoot>
				
				</table>
			</div>
		</div>
	</div>
	


	<?php include "include/footer.php"; ?>