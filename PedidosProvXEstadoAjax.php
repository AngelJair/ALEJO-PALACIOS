<?php
require_once("./checkSesion.php");
include 'conexion.php';
$Estado = $_POST['Estado'];
?>
<button class="btn btn-success" onclick="exportTableToExcel('PedidosProveedorPorEstado', 'PedidosProveedorPorEstado')">Excel</button>
<a class="btn btn-danger" href="ReportePedidosProveedorPorEstado.php?Estado=<?php echo $Estado ?>" target="_blank">PDF</a>
<br><br>

<table id="PedidosProveedorPorEstado" class="table table-hover table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">idPedido</th>
            <th scope="col">idProveedor</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Fecha</th>
            <th scope="col">FechaEntrega</th>
            <th scope="col">Estado</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody class="table-light">

        <?php
        switch ($Estado) {
            case 'Activo':
                $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                            from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                            where p.Estado = 'Activo' order by c.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;

            case 'Suspendido':
                $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                            from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                            where p.Estado = 'Suspendido' order by c.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;

            case 'Cancelado':
                $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                            from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                            where p.Estado = 'Cancelado' order by c.Nombre ASC;";
                $resultado = mysqli_query($enlace, $sql);
                break;

            case 'Todos':
                $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                            from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor order by c.Nombre ASC;";
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
                switch ($Estado) {
                    case 'Activo':
                        $sql = "select round(SUM(Total), 2) AS total
                                                    from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                    where p.Estado = 'Activo';";
                        $resultado = mysqli_query($enlace, $sql);
                        break;

                    case 'Suspendido':
                        $sql = "select round(SUM(Total), 2) AS total
                                                    from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                    where p.Estado = 'Suspendido';";
                        $resultado = mysqli_query($enlace, $sql);
                        break;

                    case 'Cancelado':
                        $sql = "select round(SUM(Total), 2) AS total
                                                    from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                    where p.Estado = 'Cancelado';";
                        $resultado = mysqli_query($enlace, $sql);
                        break;

                    case 'Todos':
                        $sql = "select round(SUM(Total), 2) AS total
                                                    from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor ;";
                        $resultado = mysqli_query($enlace, $sql);
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
        $('#PedidosProveedorPorEstado').DataTable();
        windows.location.reload();
    });
</script>
<!-- DataTable -->