<?php

if (!isset($_SESSION['usuario'])) { //Si no hay usuario en lasesion redirige a login
    header('Location:index.php?location=login');
} else {//Si hay usuario
    if (isset($_POST['crear'])) {//
        
            //Comprobamos que la matricula no exsite
           $validacion=   Vehiculo::comprobarVehiculoYaExistente($_POST['matricula']);
    
           //Si nos devuelve un mensaje es que esa matricula existe
           if($validacion!=""){
               echo "";
           }else{//En caso contrario crea el vehiculo
               //Obtenemos la foto
            $binario_nombre_temporal=$_FILES['foto']['tmp_name'];
            //La preparamos para subirla a la bd
            $binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));
            
                //Creamos el vehiculo con los datos que tenemos
            Vehiculo::crearVehiculo($_POST['matricula'],$_POST['marca'],$_POST['plazas'],$_POST['maletas'], $_POST['descripcion'] ,$_POST['precio'],$_POST['tipo'], $binario_contenido);
            //Redirige a el inicio de admin
            header('Location:index.php?page='.$_SESSION['page'].'&location=admin');
            
          
           }
    }
    
 

    if (isset($_POST['cancelar'])) {//Si se pulsa volver vuelve a la pagina de incio de admin
        header('Location:index.php?page='.$_SESSION['page'].'&location=admin');
    } else {
        include 'view/layout.php';
       
    }
}
?>