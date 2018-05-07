<?php

if (!isset($_SESSION['usuario'])) { //Si no hay usuario en lasesion redirige a login
    header('Location:index.php?location=login');
} else {//Si hay usuario
    if (isset($_POST['modificar'])) {//
        
     

            //Obtenemos el vehiculo que vamos a modificar
            $vehiculos = Vehiculo::obtenerVehiculo($_GET['matriculamod']);
            //Obtenemos la foto
            $binario_nombre_temporal=$_FILES['foto']['tmp_name'];
             //La preparamos para subirla a la bd
            $binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));
            
            //Modificamos el vehiculo con los nuevos parametros
            $vehiculos->modificarVehiculo($_POST['matricula'],$_POST['marca'],$_POST['plazas'],$_POST['maletas'], $_POST['descripcion'] ,$_POST['precio'],$_POST['tipo'], $binario_contenido);
            //Redirige a manenimiento
            header('Location:index.php?page='.$_SESSION['page'].'&location=admin');
            
          
        
    }
    


    if (isset($_POST['cancelar'])) {//Si se pulsa volver vuelve a la pagina de mantenimiento(Lista de departamentos)
        header('Location:index.php?page='.$_SESSION['page'].'&location=admin');
    } else {
        include 'view/layout.php';
       
    }
}
?>