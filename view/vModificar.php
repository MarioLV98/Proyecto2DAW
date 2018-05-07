
<div class="container">
    <form action="index.php?location=modificar" id="formulario" method="post">

        <?php
        if (isset($_POST['modifica'])) {
            $pass = validarCadenaAlfanumerica($_POST['contrasenaregistro'], 3, 100);
            $desc = validarCadenaAlfabetica($_POST['descripcionmod'], 3, 20);
        }
        ?>

        <div class="well">
            <h4>Editar usuario</h4>
            <div class="col-md-2 col-sm-2 col-xs-12 form-group has-success">
            <label for="usuario">Usuario:</label><br />
            
                <input class="form-control" type="text" name="usuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" readonly><br />
                <p id="err"></p>
            </div>

            <div class="col-md-2 col-sm-2 col-xs-12 form-group <?php if (isset($_POST['modifica'])) {
            if ($pass == "") {
                echo "has-success";
            } else {
                echo "has-error";
            }
        } ?>">
            <label for="contrasena">Contraseña:</label><br />
            
                <input class="form-control" type="password" name="contrasenaregistro" value="<?php if (isset($_POST['modifica'])) {
            echo $_POST['contrasenaregistro'];
        } ?>"><br />
                <p id="err"><?php if (isset($_POST['modifica'])) {
                        echo $valida = validarCadenaAlfanumerica($_POST['contrasenaregistro'], 3, 100);
                    } ?></p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 form-group <?php if (isset($_POST['modifica'])) {
                        if ($desc == "") {
                            echo "has-success";
                        } else {
                            echo "has-error";
                        }
                    } ?>">

            <label for="descripcion">Descripcion :</label><br />
                            <input class="form-control" type="text" name="descripcionmod" value="<?php if (isset($_POST['modifica'])) {
                        echo $_POST['descripcionmod'];
                    } else {
                        echo $_SESSION['usuario']->getDescUsuario();
                    } ?>"><br />
                <p id="err"><?php if (isset($_POST['modifica'])) {
                        echo $valida = validarCadenaAlfabetica($_POST['descripcionmod'], 3, 20);
                    } ?></p>
            </div>



            <p>¿Desea modificar?</p>
            <input class="btn btn-primary" type="submit" name="modifica" value="Modificar"/>
            <input class="btn btn-warning" type="submit" name="cancelar" value="Cancelar"/>

        </div>      
    </form>
</div>