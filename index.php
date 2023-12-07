<?php
require_once("./checkSesion.php");
?>

<!doctype html>
<html lang="es">

<head>
  <title>Grupo Alejo Palacios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <?php
    require_once('./menuLateral.php');
    ?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <?php
      require_once('./infoUsuario.php');
      ?>

      <div align='center'>
        <img src="GrupoAlejo.jpg" class="img-fluid" width="500" height="500">
      </div>
    </div>
  </div>
</body>

</html>