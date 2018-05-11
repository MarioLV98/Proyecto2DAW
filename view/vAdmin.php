<form id="form" action="index.php?page=<?php echo $_GET['page'] ?>&location=admin" method="post">
    <div class="container-fluid">

        <?php
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };
        $start_from = ($page - 1) * $limit;
        ?>

        <div class="col-md-2 col-sm-2 col-xs-12">
            <img style="width: 70%; height: 50%;" src="webroot/Logo.PNG">
        </div>

        <div class="col-md-1 col-sm-1 col-xs-12 pull-right well" style="background-color: orangered">
            <button class="btn btn-primary btn-xs" type="submit" name="salir" value="salir">Cerrar sesion</button>

        </div>
        <br>
        <div class="col-md-12 col-sm-12 col-xs-12 well" style="background-color:cornflowerblue;">
            <br>

            <strong>Criterio de busqueda:</strong>
            <br>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input  id="cr1" type="radio" name="tipovehiculo" value="utilitario" <?php if(isset($_POST['buscar'])){if(isset($_POST['tipovehiculo'])){if($_POST['tipovehiculo']=="utilitario"){echo "checked";}}}?>><strong> Utilitario</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id="cr2" type="radio" name="tipovehiculo" value="turismo" <?php if(isset($_POST['buscar'])){if(isset($_POST['tipovehiculo'])){if($_POST['tipovehiculo']=="turismo"){echo "checked";}}}?>><strong> Turismo</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id="cr3" type="radio" name="tipovehiculo" value="deportivo" <?php if(isset($_POST['buscar'])){if(isset($_POST['tipovehiculo'])){if($_POST['tipovehiculo']=="deportivo"){echo "checked";}}}?>><strong> Deportivo</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id="cr4" type="radio" name="tipovehiculo" value="furgoneta" <?php if(isset($_POST['buscar'])){if(isset($_POST['tipovehiculo'])){if($_POST['tipovehiculo']=="furgoneta"){echo "checked";}}}?>><strong> Furgoneta</strong>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id="cr5" type="radio" name="precio" value="<=" <?php if(isset($_POST['buscar'])){if(isset($_POST['precio'])){if($_POST['precio']=="<="){echo "checked";}}}?>><strong> Hasta</strong>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id="cr6" type="radio" name="precio" value=">=" <?php if(isset($_POST['buscar'])){if(isset($_POST['precio'])){if($_POST['precio']==">="){echo "checked";}}}?>><strong> Desde</strong>
                </div>
            </div>
            <br>
            <hr>
            <br>

            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                <input id="marca" type="text" class="form-control" name="busqueda" value="<?php if(isset($_POST['buscar'])){echo $_POST['busqueda'];}?>" placeholder="Marca y modelo">
            </div>

            <div class="col-md-5 col-sm-5 col-xs-12"></div>

            <div class="form-group col-md-2 col-sm-2 col-xs-12">    
                <input id="precio" type="number" class="form-control" name="busquedaprecio" value="<?php if(isset($_POST['buscar'])){echo $_POST['busquedaprecio'];}?>" placeholder="Precio">    
            </div>
            <div class="form-group col-md-2 col-sm-2 col-xs-12"></div>

            <div class="col-md-5 col-sm-5 col-xs-12"></div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="btn-group  btn-group-lg">
                    <input class="btn btn-info" type="submit" name="buscar" value="Buscar">
                    <input id="limpiar" class="btn btn-danger" type="submit" name="limpiar" value="Limpiar campos">
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12"></div>
        </div>


    </div>
    <div class="container-fluid">
        <?php
        if (isset($_POST['paginacion']) || $_SESSION['pag'] == "NO") {
            $pag = "checked";
        } else {
            $pag = "";
        }
        ?>
        <input class="btn btn-success" type="submit" name="crear" value="Nuevo vehiculo"><input class="btn btn-primary pull-right" type="submit" name="registro" value="Ver Registro"><br>
        <input type="checkbox" id="paginacion" value="paginacion" name="paginacion" <?php echo $pag ?>><strong> Mostrar todo</strong> 
    </div>
</form>
<br>
<div class="container-fluid">
    <div class="table-responsive">      
        <table class="table table-striped table-hover table-bordered" style="text-align: center;">
            <tr class="danger active" >

                <th>MATRICULA</th>
                <th>MARCA</th>
                <th>DESCRIPCION</th>
                <th>TIPO</th>
                <th>PRECIO</th>
                <th>PLAZAS</th>
                <th>MALETAS</th>  
                <th>Acciones Sobre vehiculo</th>

            </tr>

            <tr>
                <?php
                if (count($vehiculos) == 0) {
                    echo "<td class='warning' colspan='7'>No hemos encontrado el vehiculo buscado</td>";
                } else {

                    for ($i = 0; $i < count($vehiculos); $i++) {

                        echo "<tr>";
                        echo "<td>" . $vehiculos[$i]->getMatricula() . "</td>";
                        echo "<td>" . $vehiculos[$i]->getMarca() . "</td>";
                        echo "<td>" . $vehiculos[$i]->getDescVehiculo() . "</td>";
                        echo "<td>" . $vehiculos[$i]->getTipo() . "</td>";
                        echo "<td>" . $vehiculos[$i]->getPrecio() . "</td>";
                        echo "<td>" . $vehiculos[$i]->getPlazas() . "</td>";
                        echo "<td>" . $vehiculos[$i]->getMaletas() . "</td>";
                        echo '<td>'
                        . '<a class="btn btn-warning" href="index.php?matriculamod=' . $vehiculos[$i]->getMatricula() . '&location=modificarvehiculo"><i class="material-icons">create</i></a>
                        <a class="btn btn-danger" href="index.php?MatriculaBorr=' . $vehiculos[$i]->getMatricula() . '&location=borrarvehiculo"><i class="material-icons">delete</i></a> '
                        ;

                        echo "</tr>";
                    }
                }
                ?>
            </tr>

        </table> 
        <?php
        $total_pages = ceil(count($vehiculos) / $limit);
        $pagLink = "<nav><ul class='pagination'>";
        if ($_SESSION['pag'] == "SI") {
            for ($i = 1; $i <= $total_pages; $i++) {
                $pagLink .= "<li><a href='index.php?page=" . $i . "'>" . $i . "</a></li>";
            };
            echo $pagLink . "</ul></nav>";
        }
        ?>
    </div>
</div>

<script>
    window.onload = function () {
        var paginacion = document.getElementById("paginacion");
        paginacion.addEventListener("click", enviar);
    }

    function enviar() {


        document.getElementById("form").submit();

    }
</script>
<script>

    $(document).ready(function () {
        $('.pagination').pagination({
            items: <?php echo $numvehiculos; ?>,
            itemsOnPage: 5,
            cssStyle: 'light-theme',
            currentPage: <?php echo $_GET['page']; ?>,
            hrefTextPrefix: 'index.php?location=admin&page='
        });
    });
    

</script>




