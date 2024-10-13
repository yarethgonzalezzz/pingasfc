<?php
    include "include/conexion.php";
    
    $query = "SELECT * FROM tbl_articulos";
    
    if (isset($_POST['nombreArticulo']) && !empty($_POST['nombreArticulo'])) {
        $vnombreArticulo = $_POST['nombreArticulo'];
        $query = "SELECT * FROM tbl_articulos WHERE nombreArticulo LIKE '%$vnombreArticulo%'";
    }
?>




<?php include "include/header.php"; ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="nuevo_articulo.php" class="btn btn-primary mt-4"> | Crear Articulo | </a>
				
				<hr>
				
				<form action="" method="post" class="form-inline">
					<div class="form-group mr-3">
						<input type="text" id="nombreArticulo" name="nombreArticulo" placeholder="Buscar por Nombre del artículo" class="form-control">
					</div>
					
					<button type="submit" name="submit" class="btn btn-warning"> Buscar </button>
				</form>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mt-3"> Listado de Artículos </h2>
				
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Codigo</th>
							<th>Nombre Artículo</th>			
							<th>Fecha</th>
							<th>Descripción artículo</th>
							<th>Cantidad Existencia</th>
							<th>Precio Artículo</th>
							<th>Código Marca</th>
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
										echo "<td>" . $extraer['nombreArticulo'] . "</td>";
										echo "<td>" . $extraer['fecha'] . "</td>";
										echo "<td>" . $extraer['descripcionarticulo'] . "</td>";
										echo "<td>" . $extraer['cantidadExistencia'] . "</td>";
										echo "<td>" . $extraer['precioArticulo'] . "</td>";
										echo "<td>" . $extraer['codigoMarca'] . "</td>";
										
										
										echo "<td>";
											echo "<a href=\"editar_articulo.php?pcodigo=$extraer[codigo]\"> ✏️ Editar </a>";

											echo "<a href=\"borrar_articulo.php?pcodigo=$extraer[codigo]\"> 🗑️ Borrar </a>";
											
										
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
									
									
									$registro=mysqli_query($conexion,"select count(*) as cantidad from tbl_articulos") or die("Problemas para ejecutar el query " . mysqli_error($conexion));
									
									
									
									
									$reg=mysqli_fetch_array($registro);
								
									
									echo "<br> La cantidad de artículos registrados es: " . $reg['cantidad'];
									
									mysqli_close($conexion);
								?>
							</th>
						
						</tr>
					</tfoot>
				
				</table>
			</div>
		</div>
	</div>