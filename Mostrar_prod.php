<?php
include "clases/conexion.php";
include "clases/producto.php";

$objConexion = new conexion();
$conexion = $objConexion->conectar();

$objProducto = new producto();
$resultados = $objProducto->consultar_vista($conexion);
$contador =1;
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
    <title>Consultar Categoria</title>
    <!-- Bootstrap core CSS -->
    <link href="./Cover Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./Cover Template for Bootstrap_files/cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <div class="container">
    
      <header class="masthead mb-auto">
        <div class="inner">          
          <h4 class="cover-heading">Listado de Productos</h4>
          <br>
        </div> <!--id,nombre,valor,cantidad,categoria-->
        
        <form  action="controlador/registrar_prod.php" method="POST">
        <table class="table table-striped">
          <thead>
            <tr  class="bg-primary">
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Categoria</th>
              <th scope="col">Valor</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>
              <?php 
                while($resultados2 = mysqli_fetch_array($resultados)){
              ?>
                    <tr>
                        <td><?php echo $contador++ ?></td>
                        <td><?php echo $resultados2['nombreprod'] ?></td>
                        <td><?php echo $resultados2['nombre'] ?></td>
                        <td><?php echo $resultados2['valor'] ?></td>
                        <td><?php echo $resultados2['cantidad'] ?></td>
                        <td><a href="Editar_prod.php?id=<?php echo $resultados2['id_prod']; ?>"><img src="Imagenes/editar.png" width="25" height="25" ></a></td>
                        <td><a href="controlador/eliminar_prod.php?id=<?php echo $resultados2['id_prod']; ?>"><img src="Imagenes/drop.png" width="25" height="25" > </a></td>
                    </tr>
                <?php        
                    }
                ?>
          </tbody>
        </table>
            

        </form>
        <br>
        <button type="button" class="btn btn-primary btn-sm " onclick = "location='Menu.html'" > Volver </button>
      </header>
     
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>. <br>Modificado por: Brayan Jimenez </p>
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