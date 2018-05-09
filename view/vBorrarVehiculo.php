<div class="container well">
<form action="index.php?MatriculaBorr=<?php echo $_GET['MatriculaBorr'] ?>&location=borrarvehiculo" id="formulario" method="post">

    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">
                  <h4>Borrar vehiculo</h4>
                  
                    <label for="matricula">Matricula: </label><br />
                    <div class="form-group has-success">
                        <input class="form-control" type="text" name="matricula" value="<?php echo $_GET['MatriculaBorr'] ?>" disabled><br />
                    </div>
                    <p id="err"><?php if(isset($validacionborrado)!=""){echo $validacionborrado;}?></p>
                    <p>Desea borrar el vehiculo?</p>
             
                    <input class="btn btn-danger" type="submit" name="borrar" value="Borrar vehiculo"/>
                    <input class="btn btn-warning" type="submit" name="volver" value="Cancelar"/>

                </div>      
</form>
</div>
