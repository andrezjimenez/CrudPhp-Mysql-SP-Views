<?php
include "clases/conexion.php";
include "clases/categoria.php";

$objConexion = new conexion();
$conexion = $objConexion->conectar();

$objCategoria = new categoria();
$resultados = $objCategoria->consultar_categoria  ($conexion,$_GET['id']);
$id =$_GET['id'];

while($dato=mysqli_fetch_array($resultados)){
  $nombre=$dato['nombre'];
  $descripcion=$dato['descripcion'];
}

?>
<!DOCTYPE html>
<!-- saved from url=(0050)https://getbootstrap.com/docs/4.1/examples/cover/# -->
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">
    <title>Actualizar Categoria</title>
    <!-- Bootstrap core CSS -->
    <link href="./Cover Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./Cover Template for Bootstrap_files/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">          
          <img src="Imagenes/crud.png"><br>
          <h3 class="cover-heading">Actualizar Categoria</h3>
        </div>
        
        <form  action="controlador/editar_cat.php" method="POST">
            
          <input class="form-control form-control-sm" type="text" readonly=”readonly”   style="visibility:hidden" name="id_cat"  required value="<?php echo $id ?>" >  
          <input class="form-control form-control-sm" type="text" placeholder="Nombre" name="nombre" required value="<?php echo $nombre ?>">
          <br>
          <textarea class="form-control" aria-label="With textarea" placeholder="Descripcion" name="descripcion" required><?php echo $descripcion ?></textarea>
          <br>
          <input class="btn btn-primary btn-sm btn-block" type="submit" required value="Actualizar">
        </form>
        <br>
        <button type="button" class="btn btn-primary btn-sm " onclick = "location='Mostrar_cat.php'" > Volver </button>
      </header>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>. <br> Modificado por: Brayan Jimenez </p>
        </div>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Cover Template for Bootstrap_files/jquery-3.3.1.slim.min.js.descarga" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Cover Template for Bootstrap_files/popper.min.js.descarga"></script>
    <script src="./Cover Template for Bootstrap_files/bootstrap.min.js.descarga"></script>
  </body>
</html>