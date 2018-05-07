<?php
if (isset($_POST['registrar'])) {
    $usuario = Usuario::comprobarYaExistente($_POST['usuario']);
    $contaseña = validarCadenaAlfanumerica($_POST['contrasena'], 3, 100);
    $descripcion = validarCadenaAlfabetica($_POST['descripcion'], 3, 20);
}
?>
<div class="container well">
    <form action="index.php?location=registro" id="formulario" method="post">


        <h4>Registrar nuevo usuario</h4>
        <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="form-group <?php if (isset($_POST['registrar'])) {
    if ($usuario == "") {
        echo "has-success";
    } else {
        echo "has-error";
    }
} ?>">
            <label for="usuario">Usuario:</label><br />
            <input class="form-control" type="text" name="usuario" value="<?php
if (isset($_POST['registrar'])) {
    echo $_POST['usuario'];
}
?>"><br />
            <p id="err"><?php
if (isset($_POST['registrar'])) {
    echo $valida = Usuario::comprobarYaExistente($_POST['usuario']);
}
?></p>
        </div>


        <div class="form-group  <?php if (isset($_POST['registrar'])) {
                       if ($contaseña == "") {
                           echo "has-success";
                       } else {
                           echo "has-error";
                       }
                   } ?>">
            <label for="contrasena">Contraseña:</label><br />
            <input class="form-control" type="password" name="contrasena" value="<?php
                if (isset($_POST['registrar'])) {
                    echo $_POST['contrasena'];
                }
                ?>"><br />
            <p id="err"><?php
                if (isset($_POST['registrar'])) {
                    echo $valida = validarCadenaAlfanumerica($_POST['contrasena'], 3, 100);
                }
                ?></p>
        </div>
        </div>

<div class="col-md-4 col-sm-4 col-xs-12">
        <div class="form-group  <?php if (isset($_POST['registrar'])) {
                    if ($descripcion == "") {
                        echo "has-success";
                    } else {
                        echo "has-error";
                    }
                } ?>">
            <label for="descripcion">Descripcion:</label><br />
            <input class="form-control" type="text" name="descripcion" value="<?php
                if (isset($_POST['registrar'])) {
                    echo $_POST['descripcion'];
                }
                ?>"><br />
            <p id="err"><?php
                if (isset($_POST['registrar'])) {
                    echo $valida = validarCadenaAlfabetica($_POST['descripcion'], 3, 20);
                }
                ?></p>
        </div>
        
               <div class="form-group">
            <label for="nombre">Nombre cliente:</label><br />
            <input class="form-control" type="text" name="nombre" value="<?php
if (isset($_POST['registrar'])) {
    echo $_POST['nombre'];
}
?>"><br />
            <p id="err"><?php
if (isset($_POST['registrar'])) {
    echo $valida = validarCadenaAlfabetica($_POST['nombre'], 3, 50);
}
?></p>
        </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="apellidos">Apellidos cliente:</label><br />
            <input class="form-control" name="apellidos" value="<?php
                if (isset($_POST['registrar'])) {
                    echo $_POST['apellidos'];
                }
                ?>"><br />
            <p id="err"><?php
                if (isset($_POST['registrar'])) {
                    echo $valida = validarCadenaAlfanumerica($_POST['apellidos'], 3, 100);
                }
                ?></p>
        </div>


        <div class="form-group">
            <label for="tlf">Telefono de contacto:</label><br />
            <input class="form-control" type="text" name="tlf" value="<?php
                if (isset($_POST['registrar'])) {
                    echo $_POST['tlf'];
                }
                ?>"><br />
            <p id="err"><?php
                if (isset($_POST['registrar'])) {
                    echo $valida = validarTelefono($_POST['tlf']);
                }
                ?></p>
        </div>
</div>




<div class="col-md-3 col-sm-3 col-xs-12">
        <input class="btn btn-primary" type="submit" name="registrar" value="Registrar"/>
        <input class="btn btn-warning" type="submit" name="cancelar" value="Cancelar"/>

</div>
    </form>

</div>