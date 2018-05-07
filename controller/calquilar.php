<?php

if (!isset($_SESSION['usuario'])) {//Si no hay usuario en lasesion redirige a login
    header('Location:index.php?location=login');
} else {

    $vehiculos = Vehiculo::obtenerVehiculo($_GET['matricula']);//Se obtienen los datos del vehiculo al mostrar la matricula
    
    if (isset($_POST['alq'])) { //Si se pulsa alquilar se realizan las validaciones y si esta todo correcto se alquila el vehiculo

        $valentrega = noVacio($_POST['entrega']);
        $valrecogida = noVacio($_POST['recogida']);
        $fechas = fechaMayor($_POST['entrega'],$_POST['recogida']);
        if ($valrecogida != "" || $valentrega != ""|| $fechas!="") {
           echo "";
        }else{//Si todo va bien alquila 
            $vehiculos->alquilarVehiculo($_SESSION['usuario']->getCodUsuario(), $_POST['recogida'], $_POST['entrega'], $_GET['matricula']);
             header('Location:index.php?matricula='.$_GET['matricula'].'&location=alquilar');
        }
    }
    
    //Resta entre la fecha actual y la fecha de entrega
    $entrega = New dateTime($vehiculos->getEntrega());
    $entregaformateada = $entrega->format('y-m-d');
    //echo $entregaformateada;
    $actual =  date("y-m-d");
    //echo $actual;

    
    $f_actual= strtotime($actual);
    $f_entega = strtotime($entregaformateada);
    
    $resta = $f_actual-$f_entega;
    
    $dias= round($resta/86400);
  
    //echo dateDiff($actual,$entregaformateada);
    
    //Si el vehiculo esta alquilado(si tiene un usuario asignado) mostrará 2 botones extra uno para generar la factura y otro para cancelar el alquiler
    if($vehiculos->getCodUsuario()!=""){
        
    if($dias>=0){ //Si la resta de dias es 0 el vehhculo se libera automaticamente
       $vehiculos->liberarVehiculo($_GET['matricula']); 
       header('Location:index.php?matricula='.$_GET['matricula'].'&location=alquilar');
    }
    }
    //Si se pulsa se cancela el alquiler
     if (isset($_POST['cancelar'])) {
         $vehiculos->liberarVehiculo($_GET['matricula']);
         header('Location:index.php?matricula='.$_GET['matricula'].'&location=alquilar');
     }
     //Si se pulsa la factura se genera la factura
     if(isset($_POST['factura'])){
          header('Location:index.php?matricula='.$_GET['matricula'].'&location=factura');
     }
    
    
    
    if (isset($_POST['volver'])) {
        header('Location:index.php?page='.$_SESSION['page'].'&location=inicio');
    } else {
        include 'view/layout.php'; //En caso contrario se carga la vista
    }
}



