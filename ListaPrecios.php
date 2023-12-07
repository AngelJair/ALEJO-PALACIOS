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

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <!-- <link rel="stylesheet" href="sidebar-02/css/style.css"> -->

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->

    <!-- datatable -->
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
            <h4>PRODUCTOS POR LISTA DE PRECIOS</h4>
            <br>

            <div class="container m-0 p-0">
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label class="input-group-text" for="Cat">Categoría</label>
                        <select id="Cat" name="idCategoria" class="custom-select">
                            <option value="">Seleccione</option>
                            <?php
                            $sql = "select * from categorias";
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
                    <div class="col-md-2">
                        <label class="input-group-text" for="SubCatego">SubCategoría</label>
                        <select id="SubCatego" name="SubCatego" class="custom-select">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input id="btn_consultar" class="btn btn-primary" type="button" value="Consultar">
                    </div>
                </div>
            </div>


            <div class="container m-0 p-0">
                <div class="row">
                    <div class="col-12" id="Tabla"></div>
                </div>
            </div>
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

<!-- Select -->
<script type="text/javascript">
    $(document).ready(function() {
        var SubCategorias = $('#SubCatego');

        //Ejecutar accion al cambiar de opcion en el select de categorias
        $('#Cat').change(function() {
            var Categoria_id = $(this).val(); //obtener el id seleccionado
            if (Categoria_id !== '') { //verificar haber seleccionado una opcion valida
                /*Inicio de llamada ajax*/
                $.ajax({
                    data: {
                        Categoria_id: Categoria_id
                    }, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                    dataType: 'html', //tipo de datos que esperamos de regreso
                    type: 'POST', //mandar variables como post o get
                    url: 'get_SubCat.php' //url que recibe las variables
                }).done(function(data) { //metodo que se ejecuta cuando ajax ha completado su ejecucion 
                    console.log(data)
                    SubCategorias.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                    SubCategorias.prop('disabled', false); //habilitar el select
                });
                /*fin de llamada ajax*/

            } else { //en caso de seleccionar una opcion no valida
                SubCategorias.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
                SubCategorias.prop('disabled', true); //deshabilitar el select
            }
        });

    });
</script>
<!-- Select -->

<!-- Consulta Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
        var Tabla = $('#Tabla');

        //Ejecutar accion al cambiar de opcion en el select de categorias
        $('#btn_consultar').click(function() {
            var subCat = $('#SubCatego').val();
            var Cat = $('#Cat').val();
            console.log(subCat);
            console.log(Cat);
            // var Condicion = $('#Condicion').val();
            if (Cat && subCat !== '') { //verificar haber seleccionado una opcion valida
                /*Inicio de llamada ajax*/
                $.ajax({
                    data: {
                        subCat: subCat,
                        Cat: Cat
                    }, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                    dataType: 'html', //tipo de datos que esperamos de regreso
                    type: 'POST', //mandar variables como post o get
                    url: 'ListaPreciosAjax.php' //url que recibe las variables
                }).done(function(data) { //metodo que se ejecuta cuando ajax ha completado su ejecucion 
                    Tabla.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                });
                /*fin de llamada ajax*/
            } else { //en caso de seleccionar una opcion no valida
                alert("Seleccione una categoría y sub categoría")
                //Tabla.empty();
            }
        });

    });
</script>
<!-- Consulta Ajax -->

<!-- Excel -->
<script src="/GrupoAlejoPalacios/app/js/exportExcel.js"></script>
<!-- Excel -->

<script src="sidebar-02/js/main.js"></script>