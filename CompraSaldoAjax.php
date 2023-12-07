<?php
require_once("./checkSesion.php");
include 'conexion.php';
$Condi = $_POST['Condicion'];
?>
<button class="btn btn-success" onclick="exportTableToExcel('ComprasSaldo', 'ComprasSaldo')">Excel</button>
<a class="btn btn-danger" href="ReporteComprasSaldo.php?Condicion=<?php echo $Condi ?>" target="_blank">PDF</a>
<br><br>

<table id="ComprasSaldo" class="table table-hover table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">idCompra</th>
            <th scope="col">idProveedor</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">FechaVencimiento</th>
            <th scope="col">Factura</th>
            <th scope="col">Condición</th>
            <!-- <th scope="col">Subtotal</th>
                                        <th scope="col">IVA</th> -->
            <th scope="col">Total</th>
            <th scope="col">Saldo</th>
        </tr>
    </thead>
    <tbody class="table-light">
        <?php

        switch ($Condi) {
            case 'ConSaldo':
                $sql = "select c.Idcompra, p.idProveedor, p.Nombre, c.Fecha, c.FechaVencimiento, c.Factura, 
                                        c.Condicion, c.Subtotal, c.IVA, c.Total, round(c.Saldo,2)
                                        from compras as c INNER JOIN proveedores as p on p.idProveedor = c.idProveedor
                                        WHERE c.Saldo>0 order by p.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;
            case 'SinSaldo':
                $sql = "select c.Idcompra, p.idProveedor, p.Nombre, c.Fecha, c.FechaVencimiento, c.Factura, 
                                        c.Condicion, c.Subtotal, c.IVA, c.Total, round(c.Saldo,2)
                                        from compras as c INNER JOIN proveedores as p on p.idProveedor = c.idProveedor
                                        WHERE c.Saldo=0 order by p.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;
            case 'Todas':
                $sql = "select c.Idcompra, p.idProveedor, p.Nombre, c.Fecha, c.FechaVencimiento, c.Factura, 
                                        c.Condicion, c.Subtotal, c.IVA, c.Total, round(c.Saldo,2)
                                        from compras as c INNER JOIN proveedores as p on p.idProveedor = c.idProveedor order by p.Nombre ASC";
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
                <!-- <td><?php echo $fila[7] ?></td>
                                            <td><?php echo $fila[8] ?></td> -->
                <td><?php echo $fila[9] ?></td>
                <td><?php echo $fila[10] ?></td>
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
            <!-- <td>
                                            <?php
                                            switch ($Condi) {
                                                case 'ConSaldo':
                                                    $query = "select round(sum(Subtotal), 2) AS total FROM compras WHERE Saldo>0";
                                                    $resultado = mysqli_query($enlace, $query);
                                                    break;
                                                case 'SinSaldo':
                                                    $query = "select round(sum(Subtotal), 2) AS total FROM compras WHERE Saldo=0";
                                                    $resultado = mysqli_query($enlace, $query);
                                                    break;
                                                case 'Todas':
                                                    $query = "select round(sum(Subtotal), 2) AS total FROM compras";
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
                                                case 'ConSaldo':
                                                    $query = "select round(sum(Iva), 2) AS total FROM compras WHERE Saldo>0";
                                                    $resultado = mysqli_query($enlace, $query);
                                                    break;
                                                case 'SinSaldo':
                                                    $query = "select round(sum(Iva), 2) AS total FROM compras WHERE Saldo=0";
                                                    $resultado = mysqli_query($enlace, $query);
                                                    break;
                                                case 'Todas':
                                                    $query = "select round(sum(Iva), 2) AS total FROM compras";
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
                                        </td> -->
            <td>
                <?php
                switch ($Condi) {
                    case 'ConSaldo':
                        $query = "select round(sum(Total), 2) AS total FROM compras WHERE Saldo>0";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'SinSaldo':
                        $query = "select round(sum(Total), 2) AS total FROM compras WHERE Saldo=0";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Todas':
                        $query = "select round(sum(Total), 2) AS total FROM compras";
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
                    case 'ConSaldo':
                        $query = "select round(sum(Saldo), 2) AS total FROM compras WHERE Saldo>0";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'SinSaldo':
                        $query = "select round(sum(Saldo), 2) AS total FROM compras WHERE Saldo=0";
                        $resultado = mysqli_query($enlace, $query);
                        break;
                    case 'Todas':
                        $query = "select round(sum(Saldo), 2) AS total FROM compras";
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
        $('#ComprasSaldo').DataTable();
        windows.location.reload();
    });
</script>
<!-- DataTable -->