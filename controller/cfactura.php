<?php

//set_include_path(get_include_path() . PATH_SEPARATOR . "/../dompdf");

require 'vendor/autoload.php';
//require_once "dompdf_config.inc.php";
//require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if(!isset($_SESSION['usuario'])){
    header('Location:index.php?location=login');
}else{
    //Obtenemos el vehiculo del que vamos a generar la factura
   $vehiculos= Vehiculo::obtenerVehiculo($_GET['matricula']);


 
           
      //Obtenemos los datos del vehiculo del que vamos a generar la factura              
   $matricula = $vehiculos->getMatricula();
   $usuario = $vehiculos->getCodUsuario();
   $marca = $vehiculos->getMarca();
   $plazas=$vehiculos->getPlazas();
   $maletas=$vehiculos->getMaletas();
   $precio=$vehiculos->getPrecio();
   $descripcion=$vehiculos->getDescVehiculo();
   $recogida=$vehiculos->getRecogida();
   $entrega=$vehiculos->getEntrega();
   $tipo=$vehiculos->getTipo();
   $imagen=$vehiculos->getFoto();
   $nombre=$_SESSION['usuario']->getNombre();
   $apellidos=$_SESSION['usuario']->getApellidos();
   $tlf=$_SESSION['usuario']->getTelefono();
   
   //Calculo del precio total
    $entregacarro = New dateTime($vehiculos->getEntrega());
    $entregaformateada = $entregacarro->format('y-m-d');
    //echo $entregaformateada;
    $recogidacarro =  New DateTime($vehiculos->getRecogida());
    //echo $actual;
        $recogidaformateada=$recogidacarro->format('y-m-d');
    
    $f_recogida= strtotime( $recogidaformateada);
    $f_entega = strtotime($entregaformateada);
    
    $resta = $f_recogida-$f_entega;
    
    $dias= round($resta/86400);
    
    $positivo = $dias * -1;
    
    $total = $positivo * $precio;
 

   $html ='<html>

<head>
     <title>Resumen de cliente</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
<img style="width:70%; heigth:60%;" src=webroot/Logo.PNG>

<h5> Usuario:'. $usuario.'</h5>
<h5> Nombre:'. $nombre.'</h5>
<h5> Apellidos:'. $apellidos.'</h5>
<h5> Telefono de contacto:'. $tlf.'</h5>        
<hr>
<h5> Matricula:'. $matricula.'</h5>
<h5> Marca/Modelo:'. $marca.'</h5>
<h5> Descripcion:'. $descripcion.'</h5>
<h5> Recogida:'. $recogida .'</h5>
<h5> Entrega:'. $entrega.'</h5>
    <h5> Tipo de vehiculo:'. $tipo.'</h5>
<hr>   
<h3> Precio por dia:'. $precio.'€</h3>
<h3> Numero de dias en alquiler:'. $positivo.'</h3>  
<h3> Precio total:'. $total.'€</h3>
    
<img style="width:50%; heigth:50%;"  src="data:image/jpg;base64, '.base64_encode($imagen ).' ">

</body></html>';          

   
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_Option('chroot', 'controller');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
if($dompdf->stream()){
    //header('Location:index.php?location=inicio');
}
}


?>