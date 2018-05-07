<?php





if(!isset($_SESSION['usuario'])){//Si no hay usuario en lasesion redirige a login
    
    header('Location:index.php?location=login');
}else{
if(isset($_POST['modifica'])){//Si se pulsa modificar se realizan las validaciones
    
    //Guardamos en variables el resultado de las validaciones
    $validoPass = validarCadenaAlfanumerica($_POST['contrasenaregistro'],3,100);
    $validoDesc = validarCadenaAlfabetica($_POST['descripcionmod'],3,20);
    
    //Si el resultado de las validaciones es erroneo no se modifica el usuario
    if($validoPass!=""||$validoDesc!=""){
        
        echo "Error";
    }else{//Si el resultado de las validaciones es correcto se ejecuta la modifiacion
      if(is_null($_SESSION['usuario']->modificiarUsuario(trim($_POST['usuario']), hash('sha256', $_POST['contrasenaregistro']),$_POST['descripcionmod']))){
          echo "Error en la edicion";
      }
      header('Location:index.php?page='.$_SESSION['page'].'&location=inicio');
    }
    
}

if(isset($_POST['cancelar'])){//Si se pulsa cancelar nos lleva a inicio
     header('Location:index.php?page='.$_SESSION['page'].'&location=inicio');
}else{//Si no, carga la vista
   include 'view/layout.php';  
}

}
