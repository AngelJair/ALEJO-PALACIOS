<?php
require_once("./checkSesion.php");
include 'conexion.php';
$FI = $_POST['FI'];
$FF = $_POST['FF'];
?>
<button class="btn btn-success" onclick="exportTableToExcel('PedidosCtePorPeriodo', 'PedidosCtePorPeriodo')">Excel</button>
<a class="btn btn-danger" href="ReportePedidosCtePorPeriodo.php?FI=<?php echo $FI ?>&FF=<?php echo $FF ?>" target="_blank">PDF</a>
<br><br>

<table id="PedidosCtePorPeriodo" class="table table-hover table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">idPedido</th>
            <th scope="col">idCliente</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">FechaEntrega</th>
            <th scope="col">Estado</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody class="table-light">

        <?php
        $sql = "select p.idPedido, c.idCliente, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                    from pedidosclientes as p INNER JOIN clientes as c on p.idCliente = c.idCliente
                                    where p.Fecha between '$FI' and '$FF' order by c.Nombre ASC;";
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
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>
                <?php
                $query = "select SUM(Total) AS total from pedidosclientes as p INNER JOIN clientes as c on p.idCliente = c.idCliente
                                            where p.Fecha between '$FI' and '$FF'";
                $resultado = mysqli_query($enlace, $query);

                if ($fila = mysqli_fetch_assoc($resultado)) {
                    $total = $fila['total'];
                    echo "" . $total;
                }
                ?>
            </td>
        </tr>
    </tfoot>
</table>

<!-- DataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#PedidosCtePorPeriodo').DataTable();
        windows.location.reload();
    });
</script>
<!-- DataTable -->