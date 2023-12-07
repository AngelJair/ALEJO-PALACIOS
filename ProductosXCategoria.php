<?php
include("Conexion.php")
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Areas: 4DFruit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 align = "center">Categorias</h1>
        </div>
    </div>
    <form class="row px-3" method="post" action="ProductosXCategoria.php" id="formulario" class="formulario">
        <div class="container">
            <div class = "row">
                <div class="col-md-2">
                    <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                    <select name = "idCategoria" class="form-select" id="inputGroupSelect01">
                        <?php
                            $sql = "select * from categorias";
                            $resultado = mysqli_query($enlace, $sql);
                            while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <!-- En el option se va a guardar lo que este en 'value' -->
                            <option value = "<?php echo $fila[0]?>"><?php echo $fila[1]?></option>
                        <?php
                        }
                        mysqli_free_result($resultado);
                        ?>
                    </select>
                </div>
                <div class="col-md-2"> 
                    <button type="submit" name="btn_consultar">Consultar</button>
                </div>
            </div>
            
        </div>
    </form>
    <br>
    <?php
    if (isset($_POST['btn_consultar'])) {
            ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered text-center">
                                <thead >
                                    <tr>
                                        <th scope="col">idProducto</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">SubCategoria</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">CostoPromedio</th>
                                        <th scope="col">PrecioPub</th>
                                        <th scope="col">Existencia</th>
                                    </tr>
                                </thead>
                                <?php
                                    $idCat = $_POST['idCategoria'];
                                    $sql = "select p.idProducto, p.Nombre, sc.Concepto, c.Concepto, p.Descripcion, p.CostoPromedio, p.PrecioPub, p.Existencia 
                                            from productos as p INNER JOIN subcategorias as sc on p.idSubCategoria = sc.idSubCategoria 
                                            INNER JOIN categorias as c on sc.idCategoria = c.idCategoria 
                                            where c.idCategoria = '$idCat';                                    ";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                ?>
                                <tbody class="table-light">
                                    <tr>
                                        <td><?php echo $fila[0]?></td>
                                        <td><?php echo $fila[1]?></td>
                                        <td><?php echo $fila[2]?></td>
                                        <td><?php echo $fila[3]?></td>
                                        <td><?php echo $fila[4]?></td>
                                        <td><?php echo $fila[5]?></td>
                                        <td><?php echo $fila[6]?></td>
                                        <td><?php echo $fila[7]?></td>
                                    </tr>
                                </tbody>
                                <?php
                                }
                                mysqli_free_result($resultado);
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>