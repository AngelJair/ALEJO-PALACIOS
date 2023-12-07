<?php
include("Conexion.php")
?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/GrupoAlejoPalacios/app/assets/sidebar-02/css/style.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<h4>PRODUCTOS POR LISTA DE PRECIOS</h4>
<br>
<div class="container-fluid p-0">
    <form method="get" action="" id="formulario" class="formulario">
        <div class="row">
            <div class="col-md-2">
                <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                <select id="Cat" name="idCategoria" class="custom-select">
                    <option value="">- Seleccione -</option>
                    <?php
                    $sql = "select * from categorias";
                    $resultado = mysqli_query($enlace, $sql);
                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                        <!-- En el option se va a guardar lo que este en 'value' -->
                        <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>
                    <?php
                    }
                    mysqli_free_result($resultado);
                    ?>
                </select>
            </div>

            <!-- <div class="col-md-2">
                        <label class="input-group-text" for="inputGroupSelect01">SubCategoría</label>
                        <select name="idSubCategoria" class="custom-select" id="SubCat">
                            <?php
                            $sql = "select * from subcategorias";
                            $resultado = mysqli_query($enlace, $sql);
                            while ($fila = mysqli_fetch_array($resultado)) {
                            ?> -->
            <!-- En el option se va a guardar lo que este en 'value' -->
            <!-- <option value="<?php echo $fila[0] ?>"><?php echo $fila[2] ?></option>
                            <?php
                            }
                            mysqli_free_result($resultado);
                            ?>
                        </select>
                    </div> -->

            <div class="col-md-2">
                <label class="input-group-text" for="inputGroupSelect01">SubCategoría</label>
                <select id="SubCatego" name="SubCatego" class="custom-select">
                    <option value="">- Seleccione -</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" type="submit" name="btn_consultar">Consultar</button>
            </div>
        </div>
    </form>
</div>
<br>

<?php
if (isset($_GET['btn_consultar'])) {
    // include_once("./app/consultas/repository/consultas.repository.php");
    // $idSubCat = $_POST['idSubCategoria'];
    // $productos = ProductosRepository::getInstance()->ListaPrecios($idSubCat);
?>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="ListaPrecios" class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">idProducto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">PrecioDist</th>
                                <th scope="col">PrecioMay</th>
                                <th scope="col">PrecioMedMay</th>
                                <th scope="col">PrecioPub</th>
                            </tr>
                        </thead>
                        <?php
                        $idCat = $_GET['idCategoria'];
                        $idSubCat = $_GET['SubCat'];
                        $sql = "select p.idProducto, p.Nombre, p.Descripcion, p.PrecioDist, p.PrecioMay, p.PrecioMedMay, p.PrecioPub 
                                    FROM productos as p INNER JOIN subcategorias as sc on p.idSubCategoria=sc.idSubCategoria 
                                    inner join categorias as c on sc.idCategoria=c.idCategoria
                                    WHERE c.idCategoria= '$idCat' and sc.idSubCategoria= '$idSubCat' ORDER by p.Nombre;";

                        $resultado = mysqli_query($enlace, $sql);
                        ?>
                        <tbody class="table-light">
                            <?php
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
                                </tr>

                            <?php
                            }
                            mysqli_free_result($resultado);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <button class="btn btn-success" onclick="exportTableToExcel('ListaPrecios', 'ListaPrecios')">Exportar a Excel</button>
    <!-- <input type="button" class="btn btn-primary" onclick="tableToExcel('ListaPrecios', 'ListaPrecios')" value="Exportar a Excel"> -->
    <script>
        var Cat = document.getElementById("Cat");
        Cat.value = "<?php echo $idCat ?>";

        var SubCat = document.getElementById("SubCat");
        SubCat.value = "<?php echo $idSubCat ?>";
    </script>
<?php
}
?>

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