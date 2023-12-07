<?php
require_once("./checkSesion.php");
include 'conexion.php'; //libreria de conexion a la base
$Categoria_id = filter_input(INPUT_POST, 'Categoria_id'); //obtenemos el parametro que viene de ajax

if($Categoria_id != ''){ //verificamos nuevamente que sea una opcion valida

  if(!$enlace){
    die("<br/>Sin conexi&oacute;n.");
  }

  /*Obtenemos los discos de la banda seleccionada*/
  $sql = "select s.idSubcategoria, s.concepto from subcategorias 
          as s inner join categorias as c on s.idCategoria = c.idCategoria
          where c.concepto = '".$Categoria_id. "';";  
  $query = mysqli_query($enlace, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
  mysqli_close($enlace);
}

/**
 * Como notaras vamos a generar código `html`, esto es lo que sera retornado a `ajax` para llenar 
 * el combo dependiente
 */
?>

<option value="">Seleccione</option>
<?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
<option value="<?= $op['concepto'] ?>"><?= $op['concepto'] ?></option>
<?php endforeach; ?>