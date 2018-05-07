<?php


if(!isset($_SESSION['usuario'])){ //Si no hay usuario en lasesion redirige a login
    
    header('Location:index.php?location=login');
}else{//Si hay usuario
    
    
     
if(isset($_POST['borrar'])){//Si se pulsa borrar 
    //Obtenemos el vehiculo que vamos a borrar
    $vehiculos= Vehiculo::obtenerVehiculo($_GET['MatriculaBorr']);
    //Borra el vehiculo 
    $vehiculos->eliminarVehiculo($_GET['MatriculaBorr']);
    //Redirige a la pagina de inicio de admin
    header('Location:index.php?page='.$_SESSION['page'].'&location=admin');
}

if(isset($_POST['volver'])){//Si se pulsa volver vuelve a la pagina de inicio de admin
     header('Location:index.php?page='.$_SESSION['page'].'&location=admin');
}else{
    include 'view/layout.php';
}


}
?>