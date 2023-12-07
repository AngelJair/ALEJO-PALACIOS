<?php
include("Conexion.php")
?>
<!doctype html>
<html lang="es">
  <head>
  	<title>Grupo Alejo Palacios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="sidebar-02/css/style.css">
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
	                <i class="fa fa-bars"></i>
	            <span class="sr-only">Toggle Menu</span>
	            </button>
            </div>
			<div class="p-4 pt-5">
                <h1><a href="index.php" class="logo">Alejo Palacios</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#Catalogos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Catálogos</a>
                        <ul class="collapse list-unstyled" id="Catalogos">
                        <li>
                            <a href="ListaPrecios.php">Productos</a>
                        </li>
                        <li>
                            <a href="ClientesSaldo.php">Clientes</a>
                        </li>
                        <li>
                            <a href="ProveedorSaldo.php">Proveedores</a>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#Ventas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ventas</a>
                        <ul class="collapse list-unstyled" id="Ventas">
                        <li>
                            <a href="VentasVencidas.php">Vencidas</a>
                        </li>
                        <li>
                            <a href="VentasXPeriodoCondicion.php">Por Condicion</a>
                        </li>
                        <li>
                            <a href="VentasXSaldo.php">Por Saldo</a>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#Compras" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Compras</a>
                        <ul class="collapse list-unstyled" id="Compras">
                        <li>
                            <a href="ComprasVencidas.php">Vencidas</a>
                        </li>
                        <li>
                            <a href="ComprasPeriodoCondicion.php">Por Condicion</a>
                        </li>
                        <li>
                            <a href="CompraSaldo.php">Por Saldo</a>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#Pagos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pagos</a>
                        <ul class="collapse list-unstyled" id="Pagos">
                        <li>
                            <a href="#">Por Periodo</a>
                        </li>
                        <li>
                            <a href="#">Por Proveedor</a>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#Cobros" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cobros</a>
                        <ul class="collapse list-unstyled" id="Cobros">
                    <li>
                            <a href="#">Por Periodo</a>
                        </li>
                        <li>
                            <a href="#">Por Cliente</a>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#PedidosCte" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pedidos Clientes</a>
                        <ul class="collapse list-unstyled" id="PedidosCte">
                        <li>
                            <a href="#">Cliente</a>
                        </li>
                        <li>
                            <a href="#">Por Periodo</a>
                        </li>
                        <li>
                            <a href="#">Por Estado</a>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#PedidosProv" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pedidos Proveedores</a>
                        <ul class="collapse list-unstyled" id="PedidosProv">
                        <li>
                            <a href="#">Proveedor</a>
                        </li>
                        <li>
                            <a href="#">Por Periodo</a>
                        </li>
                        <li>
                            <a href="#">Por Estado</a>
                        </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#Cargos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cargos</a>
                        <ul class="collapse list-unstyled" id="Cargos">
                        <li>
                            <a href="#">Por Periodo</a>
                        </li>
                        </ul>
                    </li>
	            </ul>

                    <!--<div class="mb-5">
                            <h3 class="h6">Subscribe for newsletter</h3>
                            <form action="#" class="colorlib-subscribe-form">
                    <div class="form-group d-flex">
                        <div class="icon"><span class="icon-paper-plane"></span></div>
                    <input type="text" class="form-control" placeholder="Enter Email Address">
                    </div>
                </form>
                        </div>-->
	        </div>
    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2>PAGOS</h2>
            <br><br>
            <form class="row px-3" method="post" action="ConsultaPagos.php" id="formulario" class="formulario">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="input-group-text" for="inputGroupSelect01">Proveeedor</label>
                        </div>
                        <div class="col-md-2">
                            <label class="input-group-text" for="inputGroupSelect01">Forma de Pago</label>
                        </div>
                        <div class="col-md-2">
                            <label class="input-group-text" for="FI">Fecha Inicio</label>
                        </div>
                        <div class="col-md-2">
                            <label class="input-group-text" for="FF">Fecha Fin</label>
                        </div>
                        
                    </div>
                    <div class = "row">
                        <div class="col-md-2">
                            <select name = "idProveedor" class="custom-select" id="inputGroupSelect01">
                                <?php
                                    $sql = "select * from proveedores";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                ?>
                                    <!-- En el option se va a guardar lo que este en 'value' -->
                                    <option value = "<?php echo $fila[0]?>"><?php echo $fila[1]?></option>
                                <?php
                                }
                                mysqli_free_result($resultado);
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name = "FormaPago" class="custom-select" id="inputGroupSelect01">
                                <option value = "Efectivo">Efectivo</option>
                                <option value = "Transferencia">Transferencia</option>
                                <option value = "Cheque">Cheque</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="FI" id = "FI" required/>
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="FF" id = "FF" required/>
                        </div>
                        <div class="col-md-2"> 
                            <button class="btn btn-primary" type="submit" name="btn_consultar">Consultar</button>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <?php
            if (isset($_POST['btn_consultar'])) {
                    ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-bordered text-center">
                                        <thead >
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
                                        <?php
                                            $Prov = $_POST['idProveedor'];
                                            $FormaPago = $_POST['FormaPago'];
                                            $FI = $_POST['FI'];
                                            $FF = $_POST['FF'];
                                            $sql = "select p.idPago, c.idCompra, pr.Nombre, c.Fecha, c.Factura,  p.FormaPago, p.Fecha, p.Referencia, p.Importe, c.Total
                                                    from pagos as p INNER JOIN compras as c on p.idCompra = c.idCompra 
                                                    INNER JOIN proveedores as pr on c.idProveedor = pr.idProveedor 
                                                    WHERE pr.idProveedor = '$Prov' AND p.FormaPago = '$FormaPago' 
                                                    AND p.Fecha BETWEEN '$FI' AND '$FF' order by pr.Nombre ASC;;";
                                            $resultado = mysqli_query($enlace, $sql);
                                            while ($fila = mysqli_fetch_array($resultado)) {
                                        ?>
                                        <tbody class="table-light">
                                            <tr>
                                                <td><?php echo $fila[0]?></td>
                                                <td><?php echo $fila[1]?></td>
                                                <td><?php echo $fila[2]?></td>
                                                <td><?php echo $fila[3]?></td>
                                                <td><?php echo $fila[4]?></td>
                                                <td><?php echo $fila[5]?></td>
                                                <td><?php echo $fila[6]?></td>
                                                <td><?php echo $fila[7]?></td>
                                                <td><?php echo $fila[8]?></td>
                                                <td><?php echo $fila[9]?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        }
                                        mysqli_free_result($resultado);
                                        ?>
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
                                                    $query = "SELECT SUM(Importe) AS total FROM pagos";
                                                    $resultado = mysqli_query($enlace, $query);
                                                    
                                                    if ($fila = mysqli_fetch_assoc($resultado)) {
                                                        $total = $fila['total'];
                                                        echo "" . $total;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                <?php
                                                    $query = "SELECT SUM(Total) AS total FROM compras";
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
                                </div>
                            </div>
                        </div>
                    <?php
                    $archivo_csv=fopen('Pagos.csv','w');
                    if($archivo_csv){
                        $Prov = $_POST['idProveedor'];
                        $FormaPago = $_POST['FormaPago'];
                        $FI = $_POST['FI'];
                        $FF = $_POST['FF'];
                        $R="select p.idPago, c.idCompra, pr.Nombre, c.Fecha, c.Factura, c.Total, p.FormaPago, p.Fecha, p.Referencia, p.Importe 
                                from pagos as p INNER JOIN compras as c on p.idCompra = c.idCompra 
                                INNER JOIN proveedores as pr on c.idProveedor = pr.idProveedor 
                                WHERE pr.idProveedor = '$Prov' AND p.FormaPago = '$FormaPago' AND p.Fecha BETWEEN '$FI' AND '$FF' order by pr.Nombre ASC;;";
                        
                        $resultado= mysqli_query($enlace,$R);
                        fputs($archivo_csv,"idPago, idCompra, Nombre, Fecha, Factura, Total, FormaPago, Fecha, Referencia, Importe".PHP_EOL);

                        while($row = mysqli_fetch_array($resultado))
                        {
                            $filacvs=$row['0'].",".$row['1'].",".$row['2'].",".$row['3'].",".$row['4'].",".$row['5'].",".$row['6'].",".$row['7'].",".$row['8'].",".$row['9'];
                            fputs($archivo_csv,$filacvs.PHP_EOL);
                        }

                        fclose($archivo_csv);
                        //echo "El archivo fue creado correctamente";   
                    }

                    else{
                        echo "El archivo no existe o no se pudo crear";
                    }
                }
            ?>
            <div class="row">
                <div class="col-12">
                    <br>
                    <a href="Pagos.csv" download="Pagos.csv" class= "btn btn-primary btn-lg">Descargar Pagos CSV</a>
                </div>
            </div>
        </div>
	</div>

    <script src="sidebar-02/js/jquery.min.js"></script>
    <script src="sidebar-02/js/popper.js"></script>
    <script src="sidebar-02/js/bootstrap.min.js"></script>
    <script src="sidebar-02/js/main.js"></script>
  </body>
</html>