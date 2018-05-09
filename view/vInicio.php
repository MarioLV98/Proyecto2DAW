<form id="inicio" action="index.php?page=<?php echo $_SESSION['page'] ?>&location=inicio" method="post">
    <div class="container-fluid">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <img style="width: 70%; height: 50%;" src="webroot/Logo.PNG">
            </div>


            <div class="col-md-2 col-sm-2 col-xs-12 pull-right well" style="background-color: orangered">
                <button class="btn btn-primary btn-xs" type="submit" name="salir" value="salir">Cerrar sesion</button>
                <button class="btn btn-warning btn-xs" type="submit" name="modificar" value="modificar">Editar usuario</button>
                <button class="btn btn-danger btn-xs" type="submit" name="borrar" value="borrar">Borrar usuario</button>
            </div>
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



    <?php
    if (isset($_POST['pagi']) || $_SESSION['pag'] == "NO") {
        $pag = "checked";
    } else {
        $pag = "";
    }
    ?>
    <div class="container-fluid">
        <input type="checkbox" id="paginacion" value="pagi" name="pagi" <?php echo $pag ?>><strong>Mostrar todo</strong> 
    </div>






    <div class="container">

        <?php
        for ($i = 0; $i < count($vehiculos); $i++) {
            if (!is_null($vehiculos[$i]->getCodUsuario())) {
                $estado = 'Alquilado';
                $color = 'danger';
            } else {
                $estado = 'Disponible';
                $color = 'success';
            }
            echo "<div class='col-md-3 col-sm-3 col-xs-12 well'>";
            echo "<a href='index.php?matricula=" . $vehiculos[$i]->getMatricula() . "&location=alquilar'><h3 class='text-primary'>" . $vehiculos[$i]->getMarca() . "</h3></a>";
            echo "<br>";
            echo "<img style='width:135px; height:120px;' class='img-responsive pull-right' id='red'  src='data:image/jpg;base64," . base64_encode($vehiculos[$i]->getFoto()) . " '>";
            echo "<p class='text-danger'>" . $vehiculos[$i]->getTipo() . "</p>";
            echo "<p>Precio por dia: <br><strong>" . $vehiculos[$i]->getPrecio() . "€</strong></p>";
            echo "<p>Plazas: " . $vehiculos[$i]->getPlazas() . "</p>";
            echo "<p>Capacidad de maletas: " . $vehiculos[$i]->getMaletas() . "</p>";
            echo "<p class='text-$color'>Estado:  $estado </p>";
            echo "</div>";
        }
        ?>

    </div>

    <div class="container">
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
</form>

<script>
    window.onload = function () {
        var paginacion = document.getElementById("paginacion");
        paginacion.addEventListener("click", enviar);
    }

    function enviar() {


        document.getElementById("inicio").submit();

    }
</script>
<script>

    $(document).ready(function () {
        $('.pagination').pagination({
            items: <?php echo $numvehiculos; ?>,
            itemsOnPage: 8,
            cssStyle: 'light-theme',
            currentPage: <?php echo $_SESSION['page']; ?>,
            hrefTextPrefix: 'index.php?location=inicio&page='
        });
    });
    
    $('#limpiar').on('click', function () {
        $('#cr1').prop('checked', false);
        $('#cr2').prop('checked', false);
        $('#cr3').prop('checked', false);
        $('#cr4').prop('checked', false);
        $('#cr5').prop('checked', false);
        $('#cr6').prop('checked', false);
        $('#marca').val("");
        $('#precio').val("");
          
          
        
    })
</script>