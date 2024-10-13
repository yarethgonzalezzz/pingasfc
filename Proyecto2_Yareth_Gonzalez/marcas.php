<?php
    include "include/conexion.php";
    
    $query = "SELECT * FROM tbl_marcas";
    
    if (isset($_POST['nombreMarca']) && !empty($_POST['nombreMarca'])) {
        $vnombreMarca = $_POST['nombreMarca'];
        $query = "SELECT * FROM tbl_marcas WHERE nombreMarca LIKE '%$vnombreMarca%'";
    }
?>




<?php include "include/header.php"; ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="nuevaMarca.php" class="btn btn-primary mt-4"> | Crear Marca | </a>
				
				<hr>
				
				<form action="" method="post" class="form-inline">
					<div class="form-group mr-3">
						<input type="text" id="nombreMarca" name="nombreMarca" placeholder="Buscar por Nombre de marca" class="form-control">
					</div>
					
					<button type="submit" name="submit" class="btn btn-warning">Ver Resultados </button>
				</form>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mt-3"> Listado de Marcas </h2>
				
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Codigo</th>
							<th>Nombre Marca</th>			
							<th>Descripcion Marca</th>
							<th>Código Proveedor</th>
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
										echo "<td>" . $extraer['nombreMarca'] . "</td>";
										echo "<td>" . $extraer['descripcionMarca'] . "</td>";
										echo "<td>" . $extraer['codigoProveedor'] . "</td>";
										
										
										echo "<td>";
											echo "<a href=\"editar_marca.php?pcodigo=$extraer[codigo]\"> ✏️ Editar </a>";
											echo "<a href=\"borrar_marca.php?pcodigo=$extraer[codigo]\"> 🗑️ Borrar </a>";
											
										
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
									
									
									$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_marcas") or die("Problemas para ejecutar el query " . mysqli_error($conexion));
									
									
									
									
									$reg=mysqli_fetch_array($registro);
									
								
									
									echo "<br> La cantidad de marcas registradas es: " . $reg['cantidad'];
									
									mysqli_close($conexion);
								?>
							</th>
						
						</tr>
					</tfoot>
				
				</table>
			</div>
		</div>
	</div>