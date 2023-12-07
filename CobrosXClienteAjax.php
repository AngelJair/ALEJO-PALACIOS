<?php
require_once("./checkSesion.php");
include 'conexion.php';
$Cte = $_POST['Cte'];
?>
<button class="btn btn-success" onclick="exportTableToExcel('CobrosPorCliente', 'CobrosPorCliente')">Excel</button>
<a class="btn btn-danger" href="ReporteCobrosPorCliente.php?Cte=<?php echo $Cte ?>" target="_blank">PDF</a>
<br><br>

<table id="CobrosPorCliente" class="table table-hover table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">idCobro</th>
            <th scope="col">idVenta</th>
            <th scope="col">Cliente</th>
            <th scope="col">FechaVenta</th>
            <th scope="col">TipoCobro</th>
            <th scope="col">FechaCobro</th>
            <th scope="col">Referencia</th>
            <th scope="col">Importe</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody class="table-light">

        <?php
        $sql = "select c.idCobro, v.idVenta, cl.Nombre, v.Fecha, c.TipoCobro, c.Fecha, c.Referencia, c.Importe, v.Total 
                                    from cobros as c INNER JOIN ventas as v on c.idVenta = v.idVenta 
                                    INNER JOIN clientes as cl on v.idCliente = cl.idCliente 
                                    WHERE cl.Nombre = '$Cte' order by cl.Nombre ASC;";
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
                <td><?php echo $fila[8] ?></td>
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
            <td></td>
            <td>Total</td>
            <td>
                <?php
                $query = "select round(SUM(Importe),2) AS total FROM cobros as c 
                                            INNER JOIN ventas as v on c.idVenta = v.idVenta 
                                            INNER JOIN clientes as cl on v.idCliente = cl.idCliente 
                                            WHERE cl.Nombre = '$Cte';";
                $resultado = mysqli_query($enlace, $query);

                if ($fila = mysqli_fetch_assoc($resultado)) {
                    $total = $fila['total'];
                    echo "" . $total;
                }
                ?>
            </td>
            <td>
                <?php
                $query = "select round(SUM(Total),2) AS total FROM cobros as c 
                                            INNER JOIN ventas as v on c.idVenta = v.idVenta 
                                            INNER JOIN clientes as cl on v.idCliente = cl.idCliente 
                                            WHERE cl.Nombre = '$Cte';";
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
        $('#CobrosPorCliente').DataTable();
        windows.location.reload();
    });
</script>
<!-- DataTable -->