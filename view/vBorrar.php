<div class="container">
<form action="index.php?location=borrar" id="formulario" method="post">

    <div class="well">
                    <h4>Borrar usuario</h4>
                    <label for="usuario">Usuario:</label><br />
                    <div class="col-md-2 col-sm-2 col-xs-12 form-group has-success">
                        <input class="form-control" type="text" name="usuarioborrar" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" readonly><br />
                    <p id="err"></p>
                    </div>

                    
                 
                    <p>¿Desea Borrar?</p>
                    <input class="btn btn-danger" type="submit" name="borra" value="Borrar"/>
                    <input class="btn btn-warning" type="submit" name="cancelar" value="Cancelar"/>

                </div>      
</form>
</div>
