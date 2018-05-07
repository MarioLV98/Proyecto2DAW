<?php

if (!isset($_SESSION['usuario'])) {//Si no hay usuario en lasesion redirige a login
    header('Location:index.php?location=login');
} else {
   
    $numvehiculos = Vehiculo::contarVehiculos(); //Contamos los vehiculos para ver el numero de paginas con el que e va a paginar y para listarlos en caso de que no haya paginacion

    $limit = 5;//Limite de vehiculos por pagina
    
    //Si no esta definida la pagina la guardamos en $_GET y en $_SESSION para cuando la necesitemos
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $_SESSION['page'] = $_GET['page'];
    } else { //Si no esta defininida la pagina por defecto es 1
        $page = 1;
    };
    $start_from = ($page - 1) * $limit; //Variable que define desde donde se empieza a listar para cuando se cambie de página
    
 

    if (isset($_POST['salir'])) {//Si se pulsa salir se cierra la sesion y te lleva al index
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: index.php');
    } else {//Si no se cierra sesion nos carga la vista 
  

        if (isset($_POST['crear'])) {//Si se pulsa crear nos lleva a crear vehiculo
            header('Location:index.php?location=crearvehiculo');
        }

        $vehiculos = Vehiculo::listarVehiculos($start_from, $limit);//Por defecto listamos los vehiculos
        
        //Si se pulsa buscar dependiendo de los parametros buscamos y se desactiva la paginacion, si no por defecto lista
      if(isset($_POST['buscar'])){
            if(isset($_POST['tipovehiculo'])&&isset($_POST['busqueda'])){
                $vehiculos = Vehiculo::buscarVehiculosMultiBusqueda($_POST['busqueda'], $_POST['tipovehiculo']);
                $_SESSION['pag']="NO";
            }elseif (isset($_POST['tipovehiculo'])) {
                $vehiculos = Vehiculo::buscarVehiculosMultiBusqueda('%', $_POST['tipovehiculo']);
                $_SESSION['pag']="NO";
            }elseif (isset($_POST['busqueda'])) {
                $vehiculos = Vehiculo::buscarVehiculosMultiBusqueda($_POST['busqueda'], '%');
                $_SESSION['pag']="NO";
            }else{
                 $_SESSION['pag']="SI";
                 $vehiculos = Vehiculo::listarVehiculos($start_from, $limit);
            }
        }else{
            //Si esta definido paginacion, no pagina y lista desde 0 hasta el total de vehiculos
            if (isset($_POST['paginacion'])) {
               $vehiculos =  Vehiculo::listarVehiculos(0, $numvehiculos);
                $_SESSION['pag'] = "NO";
            } else {//En caso contrario pagina
                $_SESSION['pag'] = "SI";
                $vehiculos =  Vehiculo::listarVehiculos($start_from, $limit);
            }
        }

        include 'view/layout.php'; //En caso contrario se carga la vista
    }
}
