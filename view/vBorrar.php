<div class="container well">
<form action="index.php?location=borrar" id="formulario" method="post">

    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">
                    <h4>Borrar usuario</h4>
                    <label for="usuario">Usuario:</label><br />
                    <div class="form-group has-success">
                        <input class="form-control" type="text" name="usuarioborrar" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" readonly><br />
                        <p id="err"><?php if(isset($_POST['borra'])){echo Usuario::vehiculosDeUsuario($_SESSION['usuario']->getCodUsuario());}?></p>
                    </div>

                    
                 
                    <p>¿Desea Borrar?</p>
                    <input class="btn btn-danger" type="submit" name="borra" value="Borrar"/>
                    <input class="btn btn-warning" type="submit" name="cancelar" value="Cancelar"/>

                </div>      
</form>
</div>
