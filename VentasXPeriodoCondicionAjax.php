<?php
require_once("./checkSesion.php");
include 'conexion.php';
$Condi = $_POST['Condicion'];
$FI = $_POST['FI'];
$FF = $_POST['FF'];
?>

<button class="btn btn-success" onclick="exportTableToExcel('VentasPeriodoCondicion', 'ProveedoresVentasPeriodoCondicionSaldo')">Excel</button>
<a class="btn btn-danger" href="ReporteVentasPeriodoCondicion.php?Condicion=<?php echo $Condi ?>&FI=<?php echo $FI ?>&FF=<?php echo $FF ?>" target="_blank">PDF</a>
<br><br>

<table id="VentasPeriodoCondicion" class="table table-hover table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">idVenta</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Condición</th>
            <th scope="col">SubTotal</th>
            <th scope="col">IVA</th>
            <th scope="col">Total</th>
            <th scope="col">Saldo</th>
        </tr>
    </thead>
    <tbody class="table-light">
        <?php

        switch ($Condi) {
            case 'Crédito':
                $sql = "select v.idVenta, c.Nombre, v.Fecha, v.Condicion, v.Subtotal, v.IVA, v.Total, v.Saldo 
                from ventas as v INNER JOIN clientes as c on v.idCliente = c.idCliente
                where v.Condicion = 'Crédito' AND v.Fecha BETWEEN '$FI' AND '$FF' order by c.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;
            case 'Contado':
                $sql = "select v.idVenta, c.Nombre, v.Fecha, v.Condicion, v.Subtotal, v.IVA, v.Total, v.Saldo 
                from ventas as v INNER JOIN clientes as c on v.idCliente = c.idCliente
                where v.Condicion = 'Contado' AND v.Fecha BETWEEN '$FI' AND '$FF' order by c.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;
            case 'Todas':
                $sql = "select v.idVenta, c.Nombre, v.Fecha, v.Condicion, v.Subtotal, v.IVA, v.Total, v.Saldo 
                from ventas as v INNER JOIN clientes as c on v.idCliente = c.idCliente
                where v.Fecha BETWEEN '$FI' AND '$FF' order by c.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;
            default:
                # code...
                break;
        }
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
            <td>Total</td>
            <td>
                <?php
                switch ($Condi) {
                    case 'Crédito':
                        $query = "select round(SUM(Subtotal), 2) AS total FROM ventas where Condicion = 'Crédito' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Contado':
                        $query = "select round(SUM(Subtotal), 2) AS total FROM ventas where Condicion = 'Contado' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Todas':
                        $query = "select round(SUM(Subtotal), 2) AS total FROM ventas where Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    default:
                        # code...
                        break;
                }
                if ($fila = mysqli_fetch_assoc($resultado)) {
                    $total = $fila['total'];
                    echo "" . $total;
                }
                ?>
            </td>
            <td>
                <?php
                switch ($Condi) {
                    case 'Crédito':
                        $query = "select round(SUM(Iva), 2) AS total FROM ventas where Condicion = 'Crédito' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Contado':
                        $query = "select round(SUM(Iva), 2) AS total FROM ventas where Condicion = 'Contado' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Todas':
                        $query = "select round(SUM(Iva), 2) AS total FROM ventas where Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    default:
                        # code...
                        break;
                }
                if ($fila = mysqli_fetch_assoc($resultado)) {
                    $total = $fila['total'];
                    echo "" . $total;
                }
                ?>
            </td>
            <td>
                <?php
                switch ($Condi) {
                    case 'Crédito':
                        $query = "select round(SUM(Total), 2) AS total FROM ventas where Condicion = 'Crédito' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Contado':
                        $query = "select round(SUM(Total), 2) AS total FROM ventas where Condicion = 'Contado' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Todas':
                        $query = "select round(SUM(Total), 2) AS total FROM ventas where Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    default:
                        # code...
                        break;
                }
                if ($fila = mysqli_fetch_assoc($resultado)) {
                    $total = $fila['total'];
                    echo "" . $total;
                }
                ?>
            </td>
            <td>
                <?php
                switch ($Condi) {
                    case 'Crédito':
                        $query = "select round(SUM(Saldo), 2) AS total FROM ventas where Condicion = 'Crédito' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Contado':
                        $query = "select round(SUM(Saldo), 2) AS total FROM ventas where Condicion = 'Contado' AND Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Todas':
                        $query = "select round(SUM(Saldo), 2) AS total FROM ventas where Fecha BETWEEN '$FI' AND '$FF'";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    default:
                        # code...
                        break;
                }
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
        $('#VentasPeriodoCondicion').DataTable();
        windows.location.reload();
    });
</script>
<!-- DataTable -->