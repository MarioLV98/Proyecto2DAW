<div class="container">
  
        <form action="index.php?matricula=<?php echo $_GET['matricula'] ?>&location=alquilar" id="alquilarvehiculo" method="post">
                <?php

    echo "<div class='col-md-12 col-sm-12 col-xs-12 well'>";
    echo "<div class='col-md-8 col-sm-8 col-xs-12 pull-right'>";
    echo "<img class='img-responsive pull-right' id='red'  src='data:image/jpg;base64,".base64_encode($vehiculos->getFoto())." '>"; 
    echo "</div>";
    echo "<h1 class='text-primary'>" . $vehiculos->getMarca() . "</h1>";
    echo "<h4 class='text-warning'>" . $vehiculos->getDescVehiculo() . "</h4>";
    echo "<h4 class='text-danger'>" . $vehiculos->getTipo() . "</h4>";
    echo "<h3>Precio por dia: " . $vehiculos->getPrecio() . "€</h3>";
    echo "<h4>Plazas: " . $vehiculos->getPlazas() . "</h4>";
    echo "<h4>Capacidad de maletas: " . $vehiculos->getMaletas() . "</h4>";
    echo "</div>";
  
  if($vehiculos->getCodUsuario()!=""&&$vehiculos->getEntrega()!=""&&$vehiculos->getRecogida()!=""){
      $disabled = "disabled";
      if($vehiculos->getCodUsuario()==$_SESSION['usuario']->getCodUsuario()){
          echo "<h4 class='text-success'>Has alquilado este vehiculo hasta ".$vehiculos->getEntrega()."</h4>";
      }else{
          echo "<h4 class='text-danger'>Este vehiculo no se encuentra disponible hasta ".$vehiculos->getEntrega()."</h4>";
         
      }
  }else{
       $disabled = "";
  }


?>
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-md-3 col-sm-3 col-xs-12">
            <label for="recogida">Desde</label>
            <input class="form-control" type="date" name="recogida" min="<?php echo date('20y-m-d') ?>" value="<?php if(isset($_POST['alq'])){echo $_POST['recogida'];} ?>" >
            <p id="err"><?php if(isset($_POST['alq'])){ if(noVacio($_POST['recogida'])==""){echo fechaMayor($_POST['entrega'], $_POST['recogida']);}else{ echo noVacio($_POST['recogida']);}  } ?></p>
           
            </div>
            </div>
                   
            <div class="col-md-12 col-sm-12 col-xs-12">        
            <div class="form-group col-md-3 col-sm-3 col-xs-12">        
            <label for="entrega">Hasta</label>
            <input class="form-control" type="date" name="entrega" value="<?php if(isset($_POST['alq'])){echo $_POST['entrega'];} ?>">
            <p id="err"><?php if(isset($_POST['alq'])){ if(noVacio($_POST['entrega'])==""){echo fechaMayor($_POST['entrega'], $_POST['recogida']);}else{ echo noVacio($_POST['entrega']);}  }?></p>
           
            </div>
            </div>
                    <br>
                    
            <input class="btn btn-primary" id="alquilar" type="submit" name="alq" value="Alquilar" <?php echo $disabled ?>>
            <input class="btn btn-warning" id="volver" type="submit" name="volver" value="Volver">
            <?php  if($vehiculos->getCodUsuario()==$_SESSION['usuario']->getCodUsuario()){
                echo "<input class='btn btn-danger' type='submit' name='cancelar' value='Cancelar Alquiler'>" ;
                echo " ";
                echo "<input class='btn btn-success' type='submit' name='factura' value='Generar Factura en PDF'>";
            }   
            ?>
        </form>
 
</div> 



