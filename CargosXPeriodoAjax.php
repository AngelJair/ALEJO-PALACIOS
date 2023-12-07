<?php
require_once("./checkSesion.php");
include 'conexion.php';
$FI = $_POST['FI'];
$FF = $_POST['FF'];
?>

<button class="btn btn-success" onclick="exportTableToExcel('CargosPorPeriodo', 'CargosPorPeriodo')">Excel</button>
<a class="btn btn-danger" href="ReporteCargosPorPeriodo.php?FI=<?php echo $FI ?>&FF=<?php echo $FF ?>" target="_blank">PDF</a>
<br><br>

<table id="CargosPorPeriodo" class="table table-hover table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">idCargo</th>
            <th scope="col">idVenta</th>
            <th scope="col">Cliente</th>
            <th scope="col">FechaVenta</th>
            <th scope="col">FechaVencimiento</th>
            <th scope="col">FechaCargo</th>
            <th scope="col">Importe</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody class="table-light">

        <?php
        $sql = "select c.idCargo, v.idVenta, cl.Nombre, v.Fecha, v.FechaVencimiento,  c.Fecha, c.Importe, v.Total 
                                    from cargos as c INNER JOIN ventas as v on c.idVenta = v.idVenta 
                                    INNER JOIN clientes as cl on v.idCliente = cl.idCliente 
                                    WHERE c.Fecha BETWEEN '$FI' AND '$FF' order by cl.Nombre ASC;";
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
                <td><?php echo $fila[7] ?></td>
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
                $query = "select round(SUM(Importe),2) AS total 
                                            from cargos as c INNER JOIN ventas as v on c.idVenta = v.idVenta 
                                            INNER JOIN clientes as cl on v.idCliente = cl.idCliente 
                                            WHERE c.Fecha BETWEEN '$FI' AND '$FF'";
                $resultado = mysqli_query($enlace, $query);

                if ($fila = mysqli_fetch_assoc($resultado)) {
                    $total = $fila['total'];
                    echo "" . $total;
                }
                ?>
            </td>
            <td>
                <?php
                $query = "select round(SUM(Total),2) AS total 
                                            from cargos as c INNER JOIN ventas as v on c.idVenta = v.idVenta 
                                                INNER JOIN clientes as cl on v.idCliente = cl.idCliente 
                                                WHERE c.Fecha BETWEEN '$FI' AND '$FF'";
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
        $('#CargosPorPeriodo').DataTable();
        windows.location.reload();
    });
</script>
<!-- DataTable -->