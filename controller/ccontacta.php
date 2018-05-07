<?php

if(isset($_POST['enviar'])){ //Si se pulsa enviar manda un correo con los parametros
    

    if(isset($_POST['email'])&&isset($_POST['email2'])&&isset($_POST['subject'])&&isset($_POST['mensaje'])){
        
        mail($_POST['email'], $_POST['subject'], "Tu mensaje: ".$_POST['mensaje']." Responderemos a tu pregunta lo antes posible");
        mail("9mlabrav8@gmail.com", "Nueva pregunta origen: ".$_POST['email'], "Pregunta: ".$_POST['mensaje']." LABRA-CARS");
        header("Location:index.php?location=login");
    }else if(isset($_POST['cancelar'])){ //Si se pulsa cancelar vuelve al login
        header("Location:index.php?location=login");
    }
    
}else{
    include 'view/layout.php';
}

?>
