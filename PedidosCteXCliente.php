<?php
require_once("./checkSesion.php");
include("Conexion.php");
?>
<!doctype html>
<html lang="es">

<head>
    <title>Grupo Alejo Palacios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php
        require_once('./menuLateral.php');
        ?>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <?php
            require_once('./infoUsuario.php');
            ?>

            <br>
            <h4>PEDIDO POR CLIENTE</h4>
            <br>

            <div class="container m-0 p-0">
                <div class="row">
                    <div class="col-md-2">
                        <label class="input-group-text" for="inputGroupSelect01">Cliente</label>
                        <select name="Cliente" class="custom-select" id="Cliente">
                            <option value="">-- Clientes --</option>
                            <?php
                            $sql = "select * from clientes";
                            $resultado = mysqli_query($enlace, $sql);
                            while ($fila = mysqli_fetch_array($resultado)) {
                            ?>
                                <!-- En el option se va a guardar lo que este en 'value' -->
                                <option value="<?php echo $fila[1] ?>"><?php echo $fila[1] ?></option>
                            <?php
                            }
                            mysqli_free_result($resultado);
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <br>

            <div class="container m-0 p-0">
                <div class="row">
                    <div class="col-12" id="Tabla">
                    </div>
                </div>
            </div>

            <script>
                var Cte = document.getElementById("Cliente");
                Cte.value = "<?php echo $Cte ?>";
            </script>

        </div>
    </div>

    <script src="sidebar-02/js/main.js"></script>
</body>

</html>

<!-- DataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<!-- DataTable -->

<!-- Consulta Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
        var Tabla = $('#Tabla');

        $('#Cliente').change(function() {
            var Cte = $(this).val();

            if (Cte !== '') { //verificar haber seleccionado una opcion valida
                /*Inicio de llamada ajax*/
                $.ajax({
                    data: {
                        Cte: Cte
                    }, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                    dataType: 'html', //tipo de datos que esperamos de regreso
                    type: 'POST', //mandar variables como post o get
                    url: 'PedidosCteXClienteAjax.php' //url que recibe las variables
                }).done(function(data) { //metodo que se ejecuta cuando ajax ha completado su ejecucion 
                    Tabla.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                });
                /*fin de llamada ajax*/
            } else { //en caso de seleccionar una opcion no valida
                Tabla.empty();
            }

        });

    });
</script>
<!-- Consulta Ajax -->

<!-- Excel -->
<script src="/GrupoAlejoPalacios/app/js/exportExcel.js"></script>
<!-- Excel -->
<script src="sidebar-02/js/main.js"></script>