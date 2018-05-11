<?php

/*
 * Vehiculo.php
 */


/*
 * Clase Vehiculo
 */

class Registro {

    /**
     * @var $matricula matricula del vehiculo
     */
   
    private $codAlquiler;
    /**
     * @var $codUsuario codigo del usuario que alquila el vehiculo 
     */
   private $codUsuario;
    /**
     * @var $marca marca del vehiculo
     */
   private $matricula;
    /**
     * @var $plazas plazas que tiene el vehiculo
     */
   
private $nombre;
    /**
     * @var $maletas maletas que caben en el vehiculo
     */
   
private $marca;
    /**
     * @var $descVehiculo descripcion del vehiculo
     */
   private $desde;

    /**
     * @var $precio del vehiculo
     */
   
private $hasta;
    /**
     * @var $recogida recogida del vehiculo
     */
   
private $precio;
    /**
     * @var $entrega entrega del vehiculo
     */
private $total;   

   

    /**
     *  Constructor
     * 
     * Ultima revision 03/05/2018
     * Constructor al que se le pasan los paramentros
     * 
     * @param string $matricula
     * @param string $codUsuario
     * @param string $marca
     * @param string $plazas
     * @param string $maletas
     * @param string $descVehiculo
     * @param int $precio
     * @param date $recogida
     * @param date $entrega
     * @param string $tipo
     * @param mediumblob $foto
     */
    public function __construct($codAlquiler, $codUsuario, $matricula, $nombre, $marca, $desde, $hasta, $precio, $total) {
        $this->codAlquiler = $codAlquiler;
        $this->codUsuario = $codUsuario;
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->desde = $desde;
        $this->hasta = $hasta;
        $this->precio = $precio;
        $this->total = $total;
    }

    public function getCodAlquiler() {
        return $this->codAlquiler;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getDesde() {
        return $this->desde;
    }

    public function getHasta() {
        return $this->hasta;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setCodAlquiler($codAlquiler) {
        $this->codAlquiler = $codAlquiler;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setDesde($desde) {
        $this->desde = $desde;
    }

    public function setHasta($hasta) {
        $this->hasta = $hasta;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    
    /**
     * ListarVehiculos
     * 
     * Ultima revision 04/05/2018
     * Lista los vehiculos entre dos posiciones dependiendo de la pagina en la que estemos
     * 
     * @param int $start_from desde donde empieza a listar
     * @param int $limit hasta donde lista
     * @return /Vehiculo array con los vehiculos
     */
    public static function listarRegistros() {
        $registros = null;
        $registro = RegistroPDO::listarRegistros();
        if (!empty($registro)) {

            for ($i = 0; $i < count($registro); $i++) {
                $registros[$i] = new Registro($registro[$i]['codAlquiler'], $registro[$i]['codUsuario'], $registro[$i]['matricula'], $registro[$i]['nombre'], $registro[$i]['marca'], $registro[$i]['desde'], $registro[$i]['hasta'], $registro[$i]['precio'], $registro[$i]['total']);
            }
        }
        return $registros;
    }

  
    /**
     * obtenerVehiculo
     * 
     * Ultima revision 04/05/2018
     * Obtiene todos los datos de un vehiculo
     * 
     * @param string $matricula que servirá para identificar el vehiculo
     * @return \Vehiculo array con datos del vehiculo
     */
    public static function obtenerRegistro($cod) {
        $registros = null;
        $registro = RegistroPDO::obtenerRegistro($cod);
      if (!empty($registro)) {

            for ($i = 0; $i < count($registro); $i++) {
                $registros = new Registro($registro[$i]['codAlquiler'], $registro[$i]['codUsuario'], $registro[$i]['matricula'], $registro[$i]['nombre'], $registro[$i]['marca'], $registro[$i]['desde'], $registro[$i]['hasta'], $registro[$i]['precio'], $registro[$i]['total']);
            }
        }
        return $registros;
    }

 

    /**
     * modificarVehiculo
     * 
     * Ultima revision 04/05/2018
     * Modifica los datos de un vehiculo
     * 
     * @param string $matricula matricula
     * @param string $marca marca
     * @param int $plazas plazas
     * @param int $maletas maletas
     * @param string $descripcion descripcion
     * @param int $precio precio
     * @param string $tipo tipo 
     * @param mediumblob $foto foto
     * @return boolean
     */
    public function modificarRegistro($codAlquiler, $hasta, $total) {
        return RegistroPDO::modificarRegistro($codAlquiler, $hasta, $total);
    }

    /**
     * crearVehiculo
     * 
     * Ultima revision 04/05/2018
     * Crea un nuevo vehiculo
     * 
     * @param string $matricula matricula
     * @param string $marca marca
     * @param int $plazas plazas
     * @param int $maletas maletas
     * @param string $descripcion descripcion
     * @param int $precio precio
     * @param string $tipo tipo 
     * @param mediumblob $foto foto
     * @return boolean
     */
    public static function crearRegistro($codAlquiler, $codUsuario, $matricula, $nombre, $marca, $desde, $hasta, $precio, $total) {
        return RegistroPDO::nuevoRegistro($codAlquiler, $codUsuario, $matricula, $nombre, $marca, $desde, $hasta, $precio, $total);
    }

   
    public static function maxRegistros() {
        return RegistroPDO::maxRegistros();
    }
    /**
     * combrobarVehiculoYaExistente
     * 
     * Ultima revision 04/05/2018
     * Comprueba si exsite el vehiculo con esa matricula
     * 
     * @param string $valor matricula
     * @return string $valida con el texto de validacion
     */
    public static function comprobarVehiculoYaExistente($valor){
        return VehiculoPDO::comprobarYaExistente($valor);
    }
    
   

}
