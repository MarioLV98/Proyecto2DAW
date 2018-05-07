
<div class="container well">

    <form action="index.php?location=crearvehiculo" id="crearvehiculo" method="post" enctype="multipart/form-data">



        <h4>Crear Vehiculo</h4>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="marca">Marca</label>
                <input class="form-control" type="text" name="marca" minlength="3" maxlength="30" value="<?php
                if (isset($_POST['crear'])) {
                    echo $_POST['marca'];
                }
                ?>" required>
                <p id="0"></p>
               
            </div>
            <br>
            <div class="form-group">
                <label for="matricula">Matricula</label>
                <input class="form-control" type="text" name="matricula" value="<?php
                if (isset($_POST['crear'])) {
                    echo $_POST['matricula'];
                }
                ?>" required>
                <p id="1"></p>
                 <p id="err"><?php if(isset($_POST['crear'])){echo Vehiculo::comprobarVehiculoYaExistente($_POST['matricula']);} ?></p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="tipo">Tipo de vehiculo</label>
                <select class="form-control" name="tipo" required>
                    <option value=""></option>
                    <option value="utilitario"<?php
                    if (isset($_POST['crear'])) {
                        if ($_POST['tipo'] == 'utilitario') {
                            echo "selected";
                        }
                    }
                    ?>>Utilitario</option>
                    <option value="deportivo"<?php
                    if (isset($_POST['crear'])) {
                        if ($_POST['tipo'] == 'deportivo') {
                            echo "selected";
                        }
                    }
                    ?>>Deportivo</option>
                    <option value="furgoneta"<?php
                    if (isset($_POST['crear'])) {
                        if ($_POST['tipo'] == 'furgoneta') {
                            echo "selected";
                        }
                    }
                    ?>>Furgoneta</option>
                    <option value="turismo"<?php
                    if (isset($_POST['crear'])) {
                        if ($_POST['tipo'] == 'turismo') {
                            echo "selected";
                        }
                    }
                    ?>>Turismo</option>
                </select>
                <p id="2"></p>
            </div>
            <br>
            <div class="form-group">
                <label for="precio">Precio por dia</label>
                <input class="form-control" type="number" name="precio" min="5" max="1000" value="<?php
                if (isset($_POST['crear'])) {
                    echo $_POST['precio'];
                }
                ?>" required>
                <p id="3"></p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">    
            <div class="form-group">
                <label for="plazas">Plazas</label>
                <input class="form-control" type="number" min="1" max="30" name="plazas" value="<?php
                if (isset($_POST['crear'])) {
                    echo $_POST['plazas'];
                }
                ?>"required>
                <p id="4"></p>
            </div>
            <br>
            <div class="form-group">
                <label for="maletas">Maletas</label>
                <input class="form-control" type="number" name="maletas" min="1" max="30" value="<?php
                if (isset($_POST['crear'])) {
                    echo $_POST['maletas'];
                }
                ?>"required>
                <p id="5"></p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">    
            <div class="form-group">
                <label for="foto">Foto</label>
                <input class="form-control" type="file" name="foto">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcon</label>
                <textarea class="form-control" name="descripcion" cols="20" rows="10"><?php
                    if (isset($_POST['crear'])) {
                        echo $_POST['descripcion'];
                    }
                    ?></textarea>
            </div>

        </div>




        <div class="col-md-4 col-sm-4 col-xs-12">    
            <input class="btn btn-primary" id="crear"  type="submit" name="crear" value="Crear vehiculo">
            <input class="btn btn-warning" id="cancelar"  type="submit" name="cancelar" value="Cancelar">
        </div>  
    </form>
</div>

<script>

    window.onload = function () {

        var crear = document.getElementById("crear");
        crear.addEventListener("click", validar);
        var cancelar = document.getElementById("cancelar");
        cancelar.addEventListener("click", salir);
    }

    function validar(evt) {
        console.log("entramos");
        var error = false;

        var formulario = document.getElementById("crearvehiculo");
        console.log(formulario.length);
        for (i = 0; i < formulario.length - 4; i++) {

            document.getElementById(i).innerHTML = "";
            if (!formulario.elements[i].checkValidity()) {

                document.getElementById(i).innerHTML = formulario.elements[i].validationMessage.fontcolor("red");

                error = true;
            }
        }

        var matricula = formulario.elements[1].value;
        var reg_exp = /^[0-9]{4}[A-Z]{3}$/;

        if (matricula != "") {
            if (!reg_exp.test(matricula)) {

                document.getElementById(1).innerHTML = "Matricula no valida formato 9999XXX".fontcolor("red");

                error = true;
            }
        }

        if (!error) {
            formulario.submit();
        }
    }






    function salir() {
        console.log("salir");
        window.location.href = "index.php?location=admin&page=1";
    }
</script>






