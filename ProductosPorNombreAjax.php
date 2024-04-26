<?php
require_once("./checkSesion.php");
include 'conexion.php';
?>
<button class="btn btn-success" onclick="exportTableToExcel('ListaPrecios', 'ListaPrecios')">Excel</button>
<a class="btn btn-danger" href="ReporteListaPrecios.php?Cat=<?php echo $Cat ?>&subCat=<?php echo $subCat ?>" target="_blank">PDF</a>
<br><br>
<table id="ListaPrecios" class="table table-hover table-bordered text-center">
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
    <tbody class="table-light">
        <?php
        $sql = "select p.idProducto, p.Nombre, p.Descripcion, p.PrecioDist, p.PrecioMay, p.PrecioMedMay, p.PrecioPub 
        FROM productos as p INNER JOIN subcategorias as sc on p.idSubCategoria=sc.idSubCategoria 
        inner join categorias as c on sc.idCategoria=c.idCategoria
        ORDER by p.Nombre;";

        $resultado = mysqli_query($enlace, $sql);
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
</table>

<!-- DataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#ListaPrecios').DataTable({pageLength: 50});
        windows.location.reload();
    });
</script>
<!-- DataTable -->