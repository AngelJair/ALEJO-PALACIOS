<?php
require_once("./checkSesion.php");
include 'conexion.php';
$Prov = $_POST['Prov'];
?>
<button class="btn btn-success" onclick="exportTableToExcel('PagosPorProveedor', 'PagosPorProveedor')">Excel</button>
<a class="btn btn-danger" href="ReportePagosPorProveedor.php?Prov=<?php echo $Prov ?>" target="_blank">PDF</a>
<br><br>

<table id="PagosPorProveedor" class="table table-hover table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">idPago</th>
            <th scope="col">idCompra</th>
            <th scope="col">Proveedor</th>
            <th scope="col">FechaCompra</th>
            <!-- <th scope="col">Factura</th> -->
            <!-- <th scope="col">FormaPago</th> -->
            <th scope="col">FechaPago</th>
            <th scope="col">Referencia</th>
            <th scope="col">Importe</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody class="table-light">
        <?php
        $sql = "select p.idPago, c.idCompra, pr.Nombre, c.Fecha, c.Factura, 
                                        p.FormaPago, p.Fecha, p.Referencia, p.Importe, c.Total
                                        from pagos as p INNER JOIN compras as c on p.idCompra = c.idCompra 
                                        INNER JOIN proveedores as pr on c.idProveedor = pr.idProveedor 
                                        WHERE pr.Nombre = '$Prov' order by pr.Nombre ASC;";
        $resultado = mysqli_query($enlace, $sql);
        while ($fila = mysqli_fetch_array($resultado)) {
        ?>

            <tr>
                <td><?php echo $fila[0] ?></td>
                <td><?php echo $fila[1] ?></td>
                <td><?php echo $fila[2] ?></td>
                <td><?php echo $fila[3] ?></td>
                <!-- <td><?php echo $fila[4] ?></td> -->
                <!-- <td><?php echo $fila[5] ?></td> -->
                <td><?php echo $fila[6] ?></td>
                <td><?php echo $fila[7] ?></td>
                <td><?php echo $fila[8] ?></td>
                <td><?php echo $fila[9] ?></td>
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
            <!-- <td></td> -->
            <!-- <td></td> -->
            <td></td>
            <td>Total</td>
            <td>
                <?php
                $query = "select round(SUM(Importe),2) AS total FROM pagos as p 
                                            INNER JOIN compras as c on p.idCompra = c.idCompra 
                                            INNER JOIN proveedores as pr on c.idProveedor = pr.idProveedor 
                                            WHERE pr.Nombre = '$Prov'";
                $resultado = mysqli_query($enlace, $query);

                if ($fila = mysqli_fetch_assoc($resultado)) {
                    $total = $fila['total'];
                    echo "" . $total;
                }
                ?>
            </td>
            <td>
                <?php
                $query = "select round(SUM(Total),2) AS total from pagos as p 
                                            INNER JOIN compras as c on p.idCompra = c.idCompra 
                                            INNER JOIN proveedores as pr on c.idProveedor = pr.idProveedor 
                                            WHERE pr.Nombre = '$Prov'";
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
        $('#PagosPorProveedor').DataTable();
        windows.location.reload();
    });
</script>
<!-- DataTable -->