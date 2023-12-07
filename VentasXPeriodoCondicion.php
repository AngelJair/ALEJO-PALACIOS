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
            <h4>VENTAS POR PERIODO Y CONDICIÓN</h4>
            <br>

            <div class="container m-0 p-0">
                <div class="row">
                    <div class="col-md-2">
                        <label class="input-group-text" for="inputGroupSelect01">Condición</label>
                    </div>
                    <div class="col-md-2">
                        <label class="input-group-text" for="FI">Fecha Inicio</label>
                    </div>
                    <div class="col-md-2">
                        <label class="input-group-text" for="FF">Fecha Fin</label>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <select name="Condicion" class="custom-select" id="Condicion">
                            <option value="">-- Condición --</option>
                            <option value="Crédito">Crédito</option>
                            <option value="Contado">Contado</option>
                            <option value="Todas">Todas</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="FI" id="FI" required />
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="FF" id="FF" required />
                    </div>
                    <div class="col-md-2">
                        <input id="btn_consultar" class="btn btn-primary" type="button" value="Consultar">
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
                var Cond = document.getElementById("Condicion");
                Cond.value = "<?php echo $Condi ?>";

                var FI = document.getElementById("FI");
                FI.value = "<?php echo $FI ?>";

                var FF = document.getElementById("FF");
                FF.value = "<?php echo $FF ?>";
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

        $('#btn_consultar').click(function() {
            var Condicion = $('#Condicion').val();
            var FI = $('#FI').val();
            var FF = $('#FF').val();
            console.log(Condicion, FI, FF);
            //Ejecutar accion al cambiar de opcion en el select de categorias


            // var Condicion = $('#Condicion').val();
            if (Condicion && FI && FF !== '') { //verificar haber seleccionado una opcion valida
                /*Inicio de llamada ajax*/
                $.ajax({
                    data: {
                        Condicion: Condicion,
                        FI: FI,
                        FF: FF
                    }, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                    dataType: 'html', //tipo de datos que esperamos de regreso
                    type: 'POST', //mandar variables como post o get
                    url: 'VentasXPeriodoCondicionAjax.php' //url que recibe las variables
                }).done(function(data) { //metodo que se ejecuta cuando ajax ha completado su ejecucion 
                    Tabla.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                });
                /*fin de llamada ajax*/
            } else { //en caso de seleccionar una opcion no valida
                alert("Seleccione todos los campos");
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