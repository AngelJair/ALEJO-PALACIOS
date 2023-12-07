<?php
include("Conexion.php")
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset=" UTF-8">
        <meta name="author" content=" ">
        <title>GRUPO ALEJO</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Hoja de estilo.css">
        <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body bgcolor="#DA81F5">
        <header>
           <div id="logo">
                  <p>
                    <img src="GrupoAlejo.jpg" width="225" height="220" align="left">
                    <h1><em><center>GRUPO ALEJO PALACIOS</center></em></h1>
                  </p>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg  bg-body-tertiary ">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Catálogos
              </a>
              <ul class="dropdown-menu" >
                <li><a class="dropdown-item" href="Categorias.php">Productos Por Categoría</a></li>
                <li><a class="dropdown-item" href="Existencia.php">Productos Por Existencia en Inventario</a></li>
                <li><a class="dropdown-item" href="ProductosAsurtir.php">Productos Por surtir</a></li>
                <li><a class="dropdown-item" href="ListaPrecios.php">Productos Por Lista de Precios</a></li>
                <li><a class="dropdown-item" href="ClientesSaldo.php">Clientes Por Saldo</a></li>
                <li><a class="dropdown-item" href="ClientesTipo.php">Clientes Por Tipo</a></li>
                <li><a class="dropdown-item" href="ProveedorSaldo.php">Proveedores Por Saldo</a></li>
                <li><a class="dropdown-item" href="ProveedoresRepre.php">Proveedores Por Representante</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ventas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="VentasXSaldo.php">Por Saldo</a></li>
                    <li><a class="dropdown-item" href="VentasXCtePeriodo.php">Por Cliente y Período</a></li>
                    <li><a class="dropdown-item" href="VentasXPeriodoCondicion.php">Por Período y Condición</a></li>
                    <li><a class="dropdown-item" href="VentasXUsuarioPeriodo.php">Por Usuario y Período</a></li>
                    <li><a class="dropdown-item" href="VentasVencidas.php">Por Fechas Vencidas</a></li>
                    <li><a class="dropdown-item" href="VentasVencidasXCte.php">Por Fechas Vencidas Por Cliente</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Compras
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="CompraSaldo.php">Por Saldo</a></li>
                    <li><a class="dropdown-item" href="ComprasProveedorYPeriodo.php">Por Proveedor y Período</a></li>
                    <li><a class="dropdown-item" href="ComprasPeriodoCondicion.php">Por Período y Condición</a></li>
                    <li><a class="dropdown-item" href="ComprasVencidas.php">Por Fechas Vencidas</a></li>
                    <li><a class="dropdown-item" href="VencidasProv.php">Por Fechas Vencidas Por Proveedor</a></li>
                  </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ConsultaPagos.php">
                    Pagos
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="ConsultaCobros.php" >
                    Cobros
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="ConsultaCargos.php" >
                    Cargos
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pedidos
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="ConsultaPedidosCte.php">Por Cliente y Estado</a></li>
                    <li><a class="dropdown-item" href="ConsultaPedidosProv.php">Por Proveedor y Estado</a></li>
                  </ul>
            </li>
        </div>
      </div>
    </nav>
    <br>
    <h2>PEDIDO POR PROVEEDOR Y ESTADO</h2>
    <br><br>
    <form class="row px-3" method="post" action="ConsultaPedidosProv.php" id="formulario" class="formulario">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <label class="input-group-text" for="inputGroupSelect01">Proveedor</label>
                </div>
                <div class="col-md-2">
                    <label class="input-group-text" for="Estado">Estado</label>
                </div>
            </div>
            <div class = "row">
                <div class="col-md-2">
                    <select name = "idProveedor" class="form-select" id="inputGroupSelect01">
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
                    <select name = "Estado" class="form-select" id="inputGroupSelect01">
                        <option value = "Activo">Activo</option>
                        <option value = "Suspendido">Suspendido</option>
                        <option value = "Cancelado">Cancelado</option>
                        <option value = "Todos">Todos</option>
                    </select>
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
                                    <th scope="col">idPedido</th>
                                    <th scope="col">idProveedor</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">FechaEntrega</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <?php
                                    $Cte = $_POST['idProveedor'];
                                    $Estado = $_POST['Estado'];
                                    if ($Estado == 'Activo') {
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                where p.Estado = 'Activo' order by c.Nombre ASC;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    } elseif($Estado == 'Suspendido'){
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                where p.Estado = 'Suspendidoorder by c.Nombre ASC;;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    } elseif($Estado == 'Cancelado'){
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                where p.Estado = 'Cancelado'order by c.Nombre ASC;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    } elseif($Estado == 'Todos'){
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor; order by c.Nombre ASC;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    }
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
                                        <td>Total</td>
                                        <td>
                                            <?php
                                            $query = "SELECT SUM(Total) AS total FROM pedidosproveedores";
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
        }
    ?>

    </body>
    <?php

            $archivo_csv=fopen('PedidosProveedorEstado.csv','w');

            if($archivo_csv){
                $Cte = $_POST['idProveedor'];
                                    $Estado = $_POST['Estado'];
                                    if ($Estado == 'Activo') {
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                where p.Estado = 'Activo' order by c.Nombre ASC;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    } elseif($Estado == 'Suspendido'){
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                where p.Estado = 'Suspendido' order by c.Nombre ASC;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    } elseif($Estado == 'Cancelado'){
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor
                                                where p.Estado = 'Cancelado' order by c.Nombre ASC;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    } elseif($Estado == 'Todos'){
                                        $sql = "select p.idPedido, c.idProveedor, c.Nombre, p.Fecha, p.FechaEntrega, p.Estado, p.Total
                                                from pedidosproveedores as p INNER JOIN proveedores as c on p.idProveedor = c.idProveedor order by c.Nombre ASC;";
                                        $resultado = mysqli_query($enlace, $sql);
                                    }
                                fputs($archivo_csv,"idPedido, idProveedor, Nombre, Fecha, FechaEntrega, Estado, Total".PHP_EOL);

                while($row = mysqli_fetch_array($resultado))
                {
                    $filacvs=$row['0'].",".$row['1'].",".$row['2'].",".$row['3'].",".$row['4'].",".$row['5'].",".$row['6'];
                    fputs($archivo_csv,$filacvs.PHP_EOL);
                }

                fclose($archivo_csv);
                //echo "El archivo fue creado correctamente";   
            }

            else{
                echo "El archivo no existe o no se pudo crear";
            }

    ?>
                     <div class="row">
                      <div class="col-12">
                          <br>
                          <a href="PedidosProveedorEstado.csv" download="PedidosProveedorEstado.csv" class= "btn btn-primary btn-lg">Descargar Pedidos Por Proveedor Y Estado CSV</a>
                     </div>
                     </div>

    <br><br>
</html>