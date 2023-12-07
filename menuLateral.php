<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar-02/css/style.css">
</head>
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
                <a href="#Catalogos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="assets/Catalogos.png" width="32" alt="">&nbspCatálogos
                </a>
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
                <a href="#Ventas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="./assets/Ventas.png" alt="">&nbspVentas
                </a>
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
                <a href="#Compras" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="./assets/Compras.png" alt="">&nbspCompras
                </a>
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
                <a href="#Pagos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="./assets/Pagos.png" alt="">&nbspPagos
                </a>
                <ul class="collapse list-unstyled" id="Pagos">
                    <li>
                        <a href="PagosXPeriodo.php">Por Periodo</a>
                    </li>
                    <li>
                        <a href="PagosXProveedor.php">Por Proveedor</a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="#Cobros" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="./assets/Cobros.png" alt="">&nbspCobros
                </a>
                <ul class="collapse list-unstyled" id="Cobros">
                    <li>
                        <a href="CobrosXPeriodo.php">Por Periodo</a>
                    </li>
                    <li>
                        <a href="CobrosXCliente.php">Por Cliente</a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="#PedidosCte" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="./assets/Pedidos.png" alt="">&nbspPedidos Clentes
                </a>
                <ul class="collapse list-unstyled" id="PedidosCte">
                    <li>
                        <a href="PedidosCteXCliente.php">Cliente</a>
                    </li>
                    <li>
                        <a href="PedidosCteXPeriodo.php">Por Periodo</a>
                    </li>
                    <li>
                        <a href="PedidosCteXEstado.php">Por Estado</a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="#PedidosProv" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="./assets/Pedidos.png" alt="">&nbspPedidos Proveedores
                </a>
                <ul class="collapse list-unstyled" id="PedidosProv">
                    <li>
                        <a href="PedidosProvXProv.php">Proveedor</a>
                    </li>
                    <li>
                        <a href="PedidosProvXPeriodo.php">Por Periodo</a>
                    </li>
                    <li>
                        <a href="PedidosProvXEstado.php">Por Estado</a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="#Cargos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img src="./assets/Interes.png" alt="">&nbspCargos
                </a>
                <ul class="collapse list-unstyled" id="Cargos">
                    <li>
                        <a href="CargosXPeriodo.php">Por Periodo</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>

<script src="sidebar-02/js/jquery.min.js"></script>
<script src="sidebar-02/js/popper.js"></script>
<script src="sidebar-02/js/bootstrap.min.js"></script>
<script src="sidebar-02/js/main.js"></script>