<?php

/**
 * Usuario.php
 * 
 * Usuario.php
 * 
 */

/**
 * Clase Usuario
 */
class Usuario {

     /**
     * @var $codUsuario    Codigo del usuario
     */
    private $codUsuario;
    /**
     * @var $descUsuario    Descripcion de usuario
     */
    private $descUsuario;
    /**
     * @var $password    Contraseña
     */
    private $password;
    /**
     * @var $perfil   Perfil de usuario
     */
    private $perfil;
    /**
     * @var $ultimaConexion    Ultima conexion
     */
    private $ultimaConexion;
    /**
     * @var $contadorAccesos    Contador de accesos
     */
    private $contadorAccesos;
    /**
     * @var $nombre    nombre
     */
    private $nombre;
    /**
     * @var $apellidos    Apellidos
     */
    private $apellidos;
    /**
     * @var $telefono   Telefono
     */
    private $telefono;
    


    
    /**
     * Constructor
     * 
     * Ultima revision 02/05/2018
     * Constructor al que se le pasan los 
     * 
     * @author Mario Labra Villar
     * @param string $codUsuario codigo de usuario
     * @param string $descUsuario descripcion de usuario
     * @param password $password    contraseña
     * @param string $perfil    descripcion del perfil
     * @param date $ultimaConexion  fecha de ultima conexion
     * @param integer $contadorAccesos  numero de accesos
     *  @param string $nombre  numero de accesos
     *  @param string $apellidos  numero de accesos
     *  @param string $telefono numero de accesos
     */
    public function __construct($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos, $nombre, $apellidos, $telefono) {
        $this->codUsuario = $codUsuario;
        $this->descUsuario = $descUsuario;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->ultimaConexion = $ultimaConexion;
        $this->contadorAccesos = $contadorAccesos;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
    }

    
    
    /**
     * setCodUsuario
     * 
     * Ultima revision 17/02/2018
     * Modifica el codigo de usuario
     * 
     * @author Mario Labra Villar
     * @param  $codUsuario codigo de usuario
     */
        public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }
    
    /**
     * setDescUsuario
     * 
     * Ultima revision 17/02/2018
     * Modifica la descripcion del usuario
     * 
     * @author Mario Labra Villar
     * @param $descUsuario descripcion de usuario
     */
    public function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

     /**
     * setPassword
     * 
     * Ultima revision 17/02/2018
     * Modifica la contraseña de usuario
     * 
     * @author Mario Labra Villar
     * @param $password contraseña de usuario
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * setPerfil
     * 
     * Ultima revision 17/02/2018
     * Modifica la contraseña de usuario
     * 
     * @author Mario Labra Villar
     * @param $perfil modifica el perfil de usuario
     */
    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
    
    /**
     * setUltimaConexion
     * 
     * Ultima revision 17/02/2018
     * Modifica la ultima conexion del usuario
     * 
     * @author Mario Labra Villar
     * @param $ultimaConexion ultima conexion de usuario
     */

    public function setUltimaConexion($ultimaConexion) {
        $this->ultimaConexion = $ultimaConexion;
    }
    
    /**
     * setContadorAccesos
     * 
     * Ultima revision 17/02/2018
     * Modifica el numero de accesos del usuario
     * 
     * @author Mario Labra Villar
     * @param $contadorAccesos contador de accesos de usuario
     */

    public function setContadorAccesos($contadorAccesos) {
        $this->contadorAccesos = $contadorAccesos;
    }

    /**
     * Validar usuario
     * 
     * Ultima revision 19/01/2018
     * Esta funcion sirve para validar el usuario
     * 
     * @author Mario Labra Villar
     * @param string $codUsuario Codigo o nombre de usuario que introducimos en el formulario
     * @param string $password Contraseña que introducimos en el formulario
     * @return \Usuario Objeto usuario con la informacion del msmo
     */
    public static function validarUsuario($codUsuario, $password) {

        $usuario = null;

        $arrayUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
        if ($arrayUsuario) {
            $usuario = new Usuario($codUsuario, $arrayUsuario['descUsuario'], $password, $arrayUsuario['perfil'], $arrayUsuario['ultimaConexion'], $arrayUsuario['contadorAccesos'],$arrayUsuario['nombre'],$arrayUsuario['apellidos'],$arrayUsuario['telefono']);
        }

        return $usuario;
    }

    /**
     * Registrar Usuario
     * 
     * Ultima revision 19/01/2018
     * Esta funcion sirve para registrar un usuario
     * 
     * 
     * @param  $codUsuario codigo de usuario
     * @param  $password contraseña
     * @param  $desc descripcion
     * @param  $perf perfil
     * @return boolean
     */
    public static function registrarUsuario($codUsuario, $password, $desc,$nombre,$apellidos,$tlf) {


        $usuario = null;

        $arrayUsuario = UsuarioPDO::registrarUsuario($codUsuario, $password, $desc,$nombre,$apellidos,$tlf);
        print_r($arrayUsuario);
        if ($arrayUsuario) {
            $usuario = new Usuario($codUsuario, $desc, $password,'usuario',date("y-m-d"), 1,$nombre,$apellidos,$tlf);
        }

        return $usuario;
    }

    /**
     * Modificar usuario
     * 
     * Ultima revision 30/01/2018
     * Esta funcion sirve para modificar un usuario
     * 
     * @param $codUsuario  codigo de usuario
     * @param $password    contraseña
     * @param  $desc    descripcion 
     * @param $perf    perfil
     * @return  boolean
     */
    public function modificiarUsuario($codUsuario, $password, $desc) {
        
        $usuario=null;
    

        if(!is_null(UsuarioPDO::modificarUsuario($codUsuario, $password, $desc))){
            $usuario="ok";
            //Usa los metodos set para modificar los valores necesarios
            $_SESSION['usuario']->setPassword($password);
            $_SESSION['usuario']->setDescUsuario($desc);
        }
      
        return $usuario;
    }

    /**
     * Borrar usuario
     * 
     * Ultima revision 30/01/2018
     * Esta funcion sirve para borrar un usuario
     * 
     * @param $codUsuario codigo de usuario
     * @return  boolean
     */
    public function borrarUsuario($codUsuario) {
        return UsuarioPDO::borrarUsuario($codUsuario);
    }

    /**
     * Actualizar accesos
     * 
     * Ultima revision 30/01/2018
     * Esta funcion sirve actualizar los accesos
     * 
     * @param $codUsuario
     * @return  boolean
     */
    public function actualizarAccesos($codUsuario) {

        return UsuarioPDO::actualizarAccesos($codUsuario);
    }

    /**
     * Actualizar fecha acceso
     * 
     * Ultima revision 30/01/2018
     * Esta funcion sirve actualizar la fecha de acceso
     * 
     * @param  $codUsuario
     * @return boolean
     */
    public function actualizarFechaAcceso($codUsuario) {

        return UsuarioPDO::actualizarFechaAcceso($codUsuario);
    }

    /**
     * Codigo
     * 
     * Ultima revision 19/01/2018
     * Devuelve el codigo del usuario
     * 
     * @author Mario Labra Villar
     * @return string $codUsuario Cadena con el codigo del usuario
     */
    function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * Descripcion
     * 
     * Ultima revision 19/01/2018
     * Devuelve la descripcion del usuario
     *    
     * @author Mario Labra Villar
     * @return string  $getDescUsuario Cadena con la descripcion del usuario
     */
    function getDescUsuario() {
        return $this->descUsuario;
    }

    /**
     * Contraseña
     * 
     * Ultima revision 19/01/2018
     * Devuelve la contraseña
     * 
     * @author Mario Labra Villar
     * @return string $password Cadena con la contraseña
     */
    function getPassword() {
        return $this->password;
    }

    /**
     * Perfil
     * 
     * Ultima revision 19/01/2018
     * Devuelve el pefil
     * 
     * @author Mario Labra Villar
     * @return string $perfil Cadena con el perfil del usuario
     */
    function getPerfil() {
        return $this->perfil;
    }

    /**
     * Ultima conexion
     * 
     * @author Mario Labra Villar
     * Ultima revision 19/01/2018
     * 
     * Devuelve la ultima conexion de un usuario
     * @return date $utlimaConexion Ultima fecha de conexion
     */
    function getUltimaConexion() {
        return $this->ultimaConexion;
    }

    /**
     * Contador de accesos
     *  
     * Ultima revision 19/01/2018
     * Devuelve el numero de accesos del usuario
     * 
     * @author Mario Labra Villar
     * @return integer $contadorAccesos Numero de accesos del usuario
     */
    function getContadorAccesos() {
        return $this->contadorAccesos;
    }

    /**
     * commprobar Usuario
     * 
     * Ultima revision 01/02/2018
     * Devuelve si el usuario existe o no
     * 
     * @param  $valor codigo del usuario
     * @return  cadena de validacion
     */
    public static function comprobarUsuario($valor) {

        return UsuarioPDO::comprobarUsuario($valor);
    }
    /**
     * comprobar contraseña
     * 
     *  Ultima revision 01/02/2018
     * Devuelve si la contraseña es correcta o no
     * 
     * @param $user usuario
     * @param  $pass contraseña
     * @return  cadena de validacion
     */
    public static function comprobarPassword($user, $pass) {
        return UsuarioPDO::comprobarPassword($user, $pass);
    }
    
    
     /**
     * Obtener nombre
     *  
     * Ultima revision 02/05/2018
     * Devuelve el nombre del usuario
     * 
     * @author Mario Labra Villar
     * @return string nombre
     */
    public function getNombre() {
        return $this->nombre;
    }
    
     /**
     * Obtener apellidos
     *  
     * Ultima revision 02/05/2018
     * Devuelve los apellidos del usuario
     * 
     * @author Mario Labra Villar
     * @return string apellidos
     */
    public function getApellidos() {
        return $this->apellidos;
    }
    
    /**
     * Obtener telefono
     *  
     * Ultima revision 02/05/2018
     * Devuelve el telefono del usuario
     * 
     * @author Mario Labra Villar
     * @return string telefono
     */
    public function getTelefono() {
        return $this->telefono;
    }

        
    /**
     * commprobar Usuario ya existente
     * 
     * Ultima revision 01/02/2018
     * Devuelve si el usuario existe o no
     * 
     * @param  $valor codigo del usuario
     * @return  cadena de validacion
     */
    public static function comprobarYaExistente($valor) {
        return UsuarioPDO::comprobarYaExistente($valor);
    }
    
    



}
