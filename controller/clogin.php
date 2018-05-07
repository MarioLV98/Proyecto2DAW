<?php



if(isset($_SESSION['usuario'])){//Si hay sesion te lleva al index
    header("Location:index.php?location=inicio");
}else{ //Si no hay sesion se realiza la validacion de usuario
    
    $limit = 8;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $_SESSION['page'] = $_GET['page'];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;

     $vehiculos = Vehiculo::listarVehiculos($start_from, $limit);
     
     
    if(isset($_POST['registro'])){
        header('Location:index.php?location=registro');
    }
    $loginOK=false; //Sirve para comprobar que el usuario es correcto o no
    if(isset($_POST['enviar']) && isset($_POST['usuario']) && isset($_POST['contrasena'])){
        
        $usu = Usuario::validarUsuario(trim($_POST['usuario']), hash('sha256', $_POST['contrasena']));
       
        if(!is_null($usu)){ //Si se devuelve el usuario loginOk se pone true
            $loginOK=true;
        }
    }
    
    if($loginOK){//Si el login es correcto el usuario se guarda en la sesion y te lleva al index
        $_SESSION['usuario']=$usu;
        $_SESSION['usuario']->actualizarAccesos($_POST['usuario']);
        $_SESSION['usuario']->actualizarFechaAcceso($_POST['usuario']);
          if($_SESSION['usuario']->getPerfil()=='admin'){
            header('Location:index.php?page=1&location=admin'); 
        }else{
           header('Location:index.php?page=1&location=inicio'); 
        }
    }else{//Si no es correcto te lleva al formulario
        include 'view/layout.php';
    }
    
}

?>
