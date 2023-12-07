<?php
require_once("./checkSesion.php");
include_once('Conexion.php');
$Prov = $_GET['Prov'];

ob_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- <link href="bootstrap-5.3.2-dist\css\bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

    <style>
        body {
            font-family: 'Helvetica', 'Verdana', 'Monaco', sans-serif;
        }

        table {
            width: 100%;
        }

        h1 {
            text-align: center;
            margin: 0;
            width: 350px;
            margin-left: 350px;

        }

        h4 {
            margin-left: 40px;
            margin-right: 40px;
        }

        img {
            width: 150px;
            height: 150px;
            float: left;
        }

        .parametros {
            text-align: center;
            clear: both;

        }

        .inline {
            display: inline;
            /* the default for span */
        }

        .alinear-izquierda {
            float: left;
        }

        .inline {
            display: inline;
            /* the default for span */
        }

        #table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #1F26A6;
            color: white;
            white-space: nowrap;
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Pagos por proveedor</title>
</head>

<body>
    <div>
        <img src="http://<?php echo ($_SERVER['HTTP_HOST']); ?>/Alejo%20Palacios/GrupoAlejo.jpg" alt="...">
        <h1>Pagos por proveedor</h1>
    </div>

    <br>

    <div class="parametros">
        <h4 class="inline">Condición: <?php echo $Prov ?></h4>
    </div>

    <br>

    <table id="table">
        <thead>
            <tr>
                <th scope="col">idPago</th>
                <th scope="col">idCompra</th>
                <th scope="col">Proveedor</th>
                <th scope="col">FechaCompra</th>
                <th scope="col">Factura</th>
                <th scope="col">FormaPago</th>
                <th scope="col">FechaPago</th>
                <th scope="col">Referencia</th>
                <th scope="col">Importe</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
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
                    <td><?php echo $fila[4] ?></td>
                    <td><?php echo $fila[5] ?></td>
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
                <td></td>
                <td></td>
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
</body>

</html>

<?php
$html = ob_get_clean();
//echo $html;

include_once("pdf/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$domdf = new Dompdf();

// Para imagenes
$options = $domdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$domdf->setOptions(($options));
// Para imagenes



$domdf->loadHtml($html);

//$domdf->setPaper('letter');
$domdf->setPaper('A4', "Landscape");
$domdf->render();
$domdf->stream("PagosPorProveedor.pdf", array("Attachment" => false));

?>