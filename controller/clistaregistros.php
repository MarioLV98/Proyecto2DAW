<?php

if (!isset($_SESSION['usuario'])) {//Si no hay usuario en lasesion redirige a login
    header('Location:index.php?location=login');
} else {
   
        $registros= Registro::listarRegistros();
        
        if(isset($_POST['volver'])){
            header('Location:index.php?location=admin&page=1');
        }else{

        include 'view/layout.php'; //En caso contrario se carga la vista
        }
    
}
