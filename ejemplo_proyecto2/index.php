<?php include "include/header.php"; ?>




  <!-- Sección Jumbotron -->
  <div class="container">
    <div class="row">
      <div class="jumbotron">
        <h1>Ver información registrada </h1>
        <p>En este apartado se mostrará la información registrada en el formulario de solicitud de infomacion. La informacion es presenta solo de consulta.</p>
        <p><a href="ver_informacion.php"class="btn btn-primary btn-lg" role="button">Ver Datos</a></p>
      </div>
    </div>
  </div><!-- Fin Sección Jumbotron -->

  <!-- Sección de Artículos -->
  <div class="container" style="padding: 15px 10px;">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <h2>Estudiantes</h2>
        <figure></figure>
        <p>En este apartado por medio del botón Ver Resumen puede observar un resumen de los datos registrados en la tabla de estudiantes de la base de datos.</p>
        <a href="resumen_estudiantes.php" class="btn btn-success">Ver Resumen</a>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4">
        <h2>Cursos</h2>
        <figure></figure>
        <p>En este apartado por medio del botón Ver Resumen puede observar un resumen de los datos registrados en la tabla de cursos de la base de datos.</p>
        <a href="resumen_cursos.php" class="btn btn-success">Ver Resumen</a>
		
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4">
        <h2>Informacion</h2>
        <figure></figure>
         <p>En este apartado por medio del botón Ver Resumen puede observar un resumen de los datos registrados en la tabla de Solicitud de informacion de la base de datos.</p>
          <a href="resumen_informacion.php" class="btn btn-success">Ver Resumen</a>
      </div>

    </div>
  </div><!-- Fin Sección de Artículos -->


<?php include "include/fooder.php"; ?>
