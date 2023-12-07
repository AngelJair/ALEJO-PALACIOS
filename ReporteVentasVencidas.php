<?php
require_once("./checkSesion.php");
include_once('Conexion.php');

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
            margin-top: 75px;
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
    <title>Reporte Ventas Vencidas</title>
</head>

<body>
    <div>
        <img src="http://<?php echo ($_SERVER['HTTP_HOST']); ?>/Alejo%20Palacios/GrupoAlejo.jpg" alt="...">
        <h1>Ventas Vencidas</h1>
    </div>

    <table id="table">
        <thead>
            <tr>
                <th scope="col">idVenta</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Fecha Vencimiento</th>
                <th scope="col">Condición</th>
                <th scope="col">SubTotal</th>
                <th scope="col">IVA</th>
                <th scope="col">Total</th>
                <th scope="col">Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fecha_actual = date("Y-m-d");
            $sql = "select v.idVenta, c.Nombre, v.Fecha, v.FechaVencimiento, v.Condicion, v.Subtotal, v.IVA, v.Total, v.Saldo 
                    from ventas as v INNER JOIN clientes as c on v.idCliente = c.idCliente
                    where v.FechaVencimiento <= '$fecha_actual' and v.Saldo > 0 order by c.Nombre ASC;";
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
                <td>Total</td>
                <td>
                    <?php
                    $query = "select round(SUM(Subtotal), 2) AS total FROM ventas where FechaVencimiento <= '$fecha_actual' and Saldo > 0";
                    $resultado = mysqli_query($enlace, $query);

                    if ($fila = mysqli_fetch_assoc($resultado)) {
                        $total = $fila['total'];
                        echo "" . $total;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $query = "select round(SUM(Iva), 2) AS total FROM ventas where FechaVencimiento <= '$fecha_actual' and Saldo > 0";
                    $resultado = mysqli_query($enlace, $query);

                    if ($fila = mysqli_fetch_assoc($resultado)) {
                        $total = $fila['total'];
                        echo "" . $total;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $query = "select round(SUM(Total), 2) AS total FROM ventas where FechaVencimiento <= '$fecha_actual' and Saldo > 0";
                    $resultado = mysqli_query($enlace, $query);

                    if ($fila = mysqli_fetch_assoc($resultado)) {
                        $total = $fila['total'];
                        echo "" . $total;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $query = "select round(SUM(Saldo), 2) AS total FROM ventas where FechaVencimiento <= '$fecha_actual' and Saldo > 0";
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
$domdf->stream("VentasVencidas.pdf", array("Attachment" => false));

?>