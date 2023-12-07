<?php
include("Conexion.php")
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="">

    <!-- Bootstrap CSS -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">


    <title>Data Tables</title>
</head>

<body>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th scope="col">idProducto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">PrecioDist</th>
                <th scope="col">PrecioMay</th>
                <th scope="col">PrecioMedMay</th>
                <th scope="col">PrecioPub</th>
            </tr>
        </thead>
        <?php
        // $idCat = $_GET['idCategoria'];
        // $idSubCat = $_GET['idSubCategoria'];
        $sql = "select p.idProducto, p.Nombre, p.Descripcion, p.PrecioDist, p.PrecioMay, p.PrecioMedMay, p.PrecioPub 
                                    FROM productos as p INNER JOIN subcategorias as sc on p.idSubCategoria=sc.idSubCategoria 
                                    inner join categorias as c on sc.idCategoria=c.idCategoria
                                    WHERE c.idCategoria= 1 and sc.idSubCategoria= 1 ORDER by p.Nombre;";

        $resultado = mysqli_query($enlace, $sql);
        ?>
        <tbody>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
            ?>

                <tr>
                    <td><?php echo $fila[0] ?></td>
                    <td><?php echo $fila[1] ?></td>
                    <td><?php echo $fila[2] ?></td>
                    <td><?php echo $fila[3] ?></td>
                    <td><?php echo $fila[4] ?></td>
                    <td><?php echo $fila[5] ?></td>
                    <td><?php echo $fila[6] ?></td>
                </tr>

            <?php
            }
            mysqli_free_result($resultado);
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('#example').DataTable();
            windows.location.reload();
        });
    </script>


</body>

</html>