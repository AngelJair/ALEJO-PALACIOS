<nav class="navbar navbar-expand-lg mb-0 p-0">
    <div class="container-fluid">
        <h5>Usuario: <?php echo $_SESSION['usuario']; ?></h5>
        <h5>Sucursal: <?php echo $_SESSION['Sucursal']; ?></h5>
        <a id="salir" href="salir.php"></a>
        <button class="btn btn btn-outline-link" onclick="Salir()">Cerrar sesión <i class="bi bi-box-arrow-left"></i></button>
    </div>
</nav>

<script src="./cerrarSesion.js"></script>