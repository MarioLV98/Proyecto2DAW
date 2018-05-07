<?php
/**
 * Fichero UsuarioPDO.php
 * 
 * Creacion usuarios
 * 
 * @package modelo
 */




/**
 * Clase UsuarioPDO
 * 
 * Clase para crear usuarios
 * 
 * @author Mario Labra Villar
 */

class UsuarioPDO {
    
    
    //Esta funcion es la que se encarga de comprobar que el usuario introducido es correcto
    /**
     * Funcion Validar usuario
     * 
     * Ultima revision 19/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @author Mario Labra Villar
     * @param string $codUsuario Codigo de usuario
     * @param string $password  Contraseña
     * @return array $arrayUsuario Array con los datos del usuario
     */
    public static function validarUsuario($codUsuario, $password) {
        
        $arrayUsuario=[];
        $consulta="select * from Usuarios where codUsuario=? AND password=?";
        $resultado= DBPDO::ejecutarConsulta($consulta, [$codUsuario,$password]);
        
        //Comprueba que el usuario existe
        if($resultado->rowCount()){
           $usuario= $resultado->fetchObject();
           $arrayUsuario['descUsuario'] = $usuario->descUsuario;
           $arrayUsuario['perfil'] = $usuario->perfil;
           $arrayUsuario['ultimaConexion'] = $usuario->ultimaConexion;
           $arrayUsuario['contadorAccesos'] = $usuario->contadorAccesos;
           $arrayUsuario['nombre'] = $usuario->nombre;
           $arrayUsuario['apellidos'] = $usuario->apellidos;
           $arrayUsuario['telefono'] = $usuario->telefono;
            
        }
        
        //Devuelve el array con los datos del usuario
        return $arrayUsuario;
        
    }
    
    /**
     * Funcion registrar usuario
     * 
     * Ultima revision 19/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @param $codUsuario codigo de usuario
     * @param  $password    contraseña
     * @param  $desc descricion
     * @return  $registroOk combrueba si es correcto o no
     */
    public static function registrarUsuario($codUsuario, $password, $desc,$nombre,$apellidos,$tlf) {
        
        $registroOk=true;
        $consulta="insert into Usuarios values ('$codUsuario','$desc','$password','usuario','".date("y-m-d")."','2','$nombre','$apellidos','$tlf')";
        $resultado= DBPDO::ejecutarConsulta($consulta, [$codUsuario,$password,$desc,$nombre,$apellidos,$tlf]);
        
        //Comprueba que el usuario existe
        if($resultado->rowCount()!=1){
           
            $registroOk=false;
        }
        
        //Devuelve el array con los datos del usuario
        return $registroOk;
        
    }
    /**
     * Funcion modificar usuario
     * 
     * Ultima revision 30/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @param  $codUsuario codigo de usuario
     * @param $password    contraseña
     * @param $desc    descripcion de usuario
     * @param $perf    perfil de usuario
     * @return boolean $modificacionOk comprueba si es correcto o no
     */
    public static function modificarUsuario($codUsuario,$password,$desc){
        
        $modificacionOk=true;
        $consulta="update Usuarios set password='$password',descUsuario='$desc' where codUsuario='$codUsuario'";
        $resultado= DBPDO::ejecutarConsulta($consulta, [$codUsuario,$password,$desc]);
         
        
        if($resultado->rowCount()!=1){
          $modificacionOk=false;
        }
        
        return $resultado;
    }
    
    /**
     * Funcion borrar usuario
     * 
     * Ultima revision 30/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @param $codUsuario codigo de usuario
     * @return  $borradoOk comprueba si se ha borrado o no
     */
    
    public static function borrarUsuario($codUsuario){
        
        $borradoOk=true;
        $consulta="delete from Usuarios where codUsuario='$codUsuario'";
        $resultado= DBPDO::ejecutarConsulta($consulta, [$codUsuario]);
        
        if($resultado->rowCount()!=1){
            $borradoOk=false;
        }
        
        return $borradoOk;
    }
    /**
     * Funcion para actualizar accesos
     * 
     * Ultima revision 30/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * Sirve para contar el numero de visitas de cada usuario
     * 
     * @param  $codUsuario codigo de usuario que le pasamos
     */
    public static function actualizarAccesos($codUsuario){
        
        
        $consulta="update Usuarios set contadorAccesos=contadorAccesos+1 where codUsuario='$codUsuario'";
        DBPDO::ejecutarConsulta($consulta, [$codUsuario]);
        
    }
    /**
     * Funcion para actualizar la fecha de acceso
     * 
     * Ultima revision 30/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * Sirve para saber la fecha de la ultima conexion
     * 
     * @param  $codUsuario codigo de usuario que le pasamos
     */
     public static function actualizarFechaAcceso($codUsuario){
        $consulta = "update Usuarios set ultimaConexion =NOW() where codUsuario='$codUsuario'";
        DBPDO::ejecutarConsulta($consulta, [$codUsuario]);
    }
    
    /**
     * Funcion para comprobar que un usuario existe
     * 
     * Ultima revision 30/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @param $valor codigo del usuario
     * @return  con el resultado de la validacion
     */
    
    public static function  comprobarUsuario($valor){
     $valida = "";
     
     
     if(empty($valor)){
         $valida="No ha introducido ningun valor";
     }else{
         
         $consulta = "select * from Usuarios where codUsuario ='$valor'";
         $resultado = DBPDO::ejecutarConsulta($consulta, [$valor]);
         if($resultado->rowCount()==0){
       
         $valida="El usuario no existe";
         
        } 
     }
    
     return $valida;
}


    /**
     * Funcion para comprobar que la contraseña es correcta
     * 
     * Ultima revision 30/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @param  $user usuario
     * @param  $pass contraseña
     * @return  con el resultado de la validacion
     */
public static function comprobarPassword($user,$pass){
     $valida = "";
     
     
     if(empty($pass)){
         $valida="No ha introducido ningun valor";
     }else{
         
         $consulta = "select * from Usuarios where codUsuario='$user' and password =sha2('$pass','256')";
         $resultado = DBPDO::ejecutarConsulta($consulta, [$user,$pass]);
         if($resultado->rowCount()==0){
       
         $valida="Contraseña incorrecta";
         
        } 
     }
    
     return $valida;
}
/**
     * Funcion para comprobar que un suasrio que ya existe
     * 
     * Ultima revision 30/01/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @param $valor codigo del usuario
     * @return string con el resultado de la validacion
     */
public static function comprobarYaExistente($valor){
     $valida = "";
     
     if(empty($valor)){
         $valida="No ha introducido ningun valor";
     }else{
         
         $consulta = "select * from Usuarios where codUsuario ='$valor'";
         $resultado = DBPDO::ejecutarConsulta($consulta, [$valor]);
         if($resultado->rowCount()==1){
       
         $valida="El usuario ya existe";
         
        } 
     }
    
     return $valida;
}
    

}
