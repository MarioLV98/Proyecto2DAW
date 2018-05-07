
<div class="container well">

    <form action="index.php?matriculamod=<?PHP echo $_GET['matriculamod'] ?>&location=modificarvehiculo" id="formulario" method="post" enctype="multipart/form-data">

        <?php
        $vehiculos = Vehiculo::obtenerVehiculo($_GET['matriculamod']);
        ?>


        <h4>Modificar Vehiculo</h4>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="marca">Marca</label>
                <input class="form-control" type="text" name="marca" value="<?php
        if (isset($_POST['modificar'])) {
            echo $_POST['marca'];
        } else {
            echo $vehiculos->getMarca();
        }
        ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="matricula">Matricula</label>
                <input class="form-control" type="text" name="matricula" value="<?php echo $vehiculos->getMatricula(); ?>" readonly="">
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="tipo">Codigo Cliente</label>
                <select class="form-control" name="tipo">
                    <option value="utilitario"<?php if ($vehiculos->getTipo() == 'utilitario') {
                    echo "selected";
                } ?>>Utilitario</option>
                    <option value="deportivo"<?php if ($vehiculos->getTipo() == 'deportivo') {
                    echo "selected";
                } ?>>Deportivo</option>
                    <option value="furgoneta"<?php if ($vehiculos->getTipo() == 'furgoneta') {
                    echo "selected";
                } ?>>Furgoneta</option>
                    <option value="turismo"<?php if ($vehiculos->getTipo() == 'turismo') {
                    echo "selected";
                } ?>>Turismo</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="precio">Precio por dia</label>
                <input class="form-control" type="text" name="precio" value="<?php
                if (isset($_POST['modificar'])) {
                    echo $_POST['precio'];
                } else {
                    echo $vehiculos->getPrecio();
                }
        ?>">

            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">    
            <div class="form-group">
                <label for="plazas">Plazas</label>
                <input class="form-control" type="text" name="plazas" value="<?php
                if (isset($_POST['modificar'])) {
                    echo $_POST['plazas'];
                } else {
                    echo $vehiculos->getPlazas();
                }
        ?>">

            </div>
            <br>
            <div class="form-group">
                <label for="maletas">Maletas</label>
                <input class="form-control" type="text" name="maletas" value="<?php
                       if (isset($_POST['modificar'])) {
                           echo $_POST['maletas'];
                       } else {
                           echo $vehiculos->getMaletas();
                       }
        ?>">

            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">    
            <div class="form-group">
                <label for="foto">Foto</label>
                <input class="form-control" type="file" name="foto">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcon</label>
                <textarea class="form-control" name="descripcion" cols="20" rows="10"><?php echo $vehiculos->getDescVehiculo() ?></textarea>
            </div>

        </div>




        <div class="col-md-4 col-sm-4 col-xs-12">    
            <input class="btn btn-primary" type="submit" name="modificar" value="Modificar vehiculo"/>
            <input class="btn btn-warning" type="submit" name="cancelar" value="Cancelar"/>
            <br>




            </ul>


        </div>  
</div>



</form>
<br>
<div class="container">
<?php echo "<img class='img-responsive' id='red'  src='data:image/jpg;base64," . base64_encode($vehiculos->getFoto()) . " '>"; ?>
</div>
</div>

