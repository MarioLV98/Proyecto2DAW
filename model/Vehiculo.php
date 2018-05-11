<?php

/*
 * Vehiculo.php
 */


/*
 * Clase Vehiculo
 */

class Vehiculo {

    /**
     * @var $matricula matricula del vehiculo
     */
    private $matricula;

    /**
     * @var $codUsuario codigo del usuario que alquila el vehiculo 
     */
    private $codUsuario;

    /**
     * @var $marca marca del vehiculo
     */
    private $marca;

    /**
     * @var $plazas plazas que tiene el vehiculo
     */
    private $plazas;

    /**
     * @var $maletas maletas que caben en el vehiculo
     */
    private $maletas;

    /**
     * @var $descVehiculo descripcion del vehiculo
     */
    private $descVehiculo;

    /**
     * @var $precio del vehiculo
     */
    private $precio;

    /**
     * @var $recogida recogida del vehiculo
     */
    private $recogida;

    /**
     * @var $entrega entrega del vehiculo
     */
    private $entrega;

    /**
     * @var $tipo tipo de vehiculo
     */
    private $tipo;

    /**
     * @var $foto foto del vehiculo
     */
    private $foto;
    
    private $registro;

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
    public function __construct($matricula, $codUsuario, $marca, $plazas, $maletas, $descVehiculo, $precio, $recogida, $entrega, $tipo, $foto, $registro) {
        $this->matricula = $matricula;
        $this->codUsuario = $codUsuario;
        $this->marca = $marca;
        $this->plazas = $plazas;
        $this->maletas = $maletas;
        $this->descVehiculo = $descVehiculo;
        $this->precio = $precio;
        $this->recogida = $recogida;
        $this->entrega = $entrega;
        $this->tipo = $tipo;
        $this->foto = $foto;
        $this->registro = $registro;
    }

        /**
     * Matricula
     * 
     * Ultima revision 03/05/2018
     * Devuelve la matricula del vehiculo
     * 
     * @return string $matricula matricula del vehiculo
     */
    public function getMatricula() {
        return $this->matricula;
    }

    /**
     * Codigo de usuario
     * 
     * Ultima revision 04/05/2018
     * Devuelve el codigo del usuario que alquilo el vehiculo
     * 
     * @return string $codUsuario codigo del usuario
     */
    public function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * Marca
     * 
     * Ultima revision 03/05/2018
     * Devuelve la marca del vehiculo
     * 
     * @return string $marca marca del vehiculo
     */
    public function getMarca() {
        return $this->marca;
    }

    /**
     * Plazas
     * 
     * Ultima revision 03/05/2018
     * Devuelve las plazas del vehiculo
     * 
     * @return int $plazas plazas del vehiculo
     */
    public function getPlazas() {
        return $this->plazas;
    }

    /**
     * Maletas
     * 
     * Ultima revision 04/05/2018
     * Devuelve las maletas que caben en el vehiculo
     * 
     * @return int $maletas que entran en el vehiculo
     */
    public function getMaletas() {
        return $this->maletas;
    }

    public function getDescVehiculo() {
        return $this->descVehiculo;
    }

    /**
     * Descripcion
     * 
     * Ultima revision 04/05/2018
     * Devuelve una breve descripcion del vehiculo
     * 
     * @return string $descripcion descripcion del vehiculo
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * Recogida
     * 
     * Ultima revision 04/05/2018
     * Devuelve la fecha de recogida del vehiculo
     * 
     * @return date $recogida fecha de recogida del vehiculo
     */
    public function getRecogida() {
        return $this->recogida;
    }

    /**
     * Entrega
     * 
     * Ultima revision 04/05/2018
     * Devuelve la fecha de entrega del vehiculo
     * 
     * @return date $entrega fecha de entrega del vehiculo
     */
    public function getEntrega() {
        return $this->entrega;
    }

    /**
     * Tipo
     * 
     * Ultima revision 04/05/2018
     * Devuelve el tipo de vehiculo que es
     * 
     * @return string $tipo tipo del vehiculo
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * Foto
     * 
     * Ultima revision 04/05/2018
     * Devuelve la foto del vehiculo
     * 
     * @return mediumblob $foto del vehiculo
     */
    public function getFoto() {
        return $this->foto;
    }
    
    public function getRegistro() {
        return $this->registro;
    }

    
    /**
     * setMatricula
     * 
     * Ultima revision 04/05/2018
     * Modifica la matricula del vehiculo
     * 
     * @param string $matricula matricula del vehiculo
     */
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    /**
     * setCodUsuario
     * 
     *  Ultima revision 04/05/2018
     * Modifica la matricula del vehiculo
     * 
     * @param string $codUsuario codigo del usuario
     */
    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    /**
     * setMarca
     * 
     * Ultima revision 04/05/2018
     * Modifica la marca del vehiculo
     * 
     * @param sting $marca marca del vehiculo
     */
    public function setMarca($marca) {
        $this->marca = $marca;
    }

    /**
     * setPlazas
     * 
     * Ultima revision 04/05/2018
     * Modifica las plazas del vehiculo
     * 
     * @param int $plazas plazas del vehiculo
     */
    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }

    /**
     * setMaletas
     * 
     * Ultima revision 04/05/2018
     * Modifica las maletas del vehiculo
     * 
     * @param int $maletas maletas del vehiculo
     */
    public function setMaletas($maletas) {
        $this->maletas = $maletas;
    }

    /**
     * setDescVehiculo
     * 
     * Ultima revision 04/05/2018
     * Modifica la descripcion del vehiculo 
     * 
     * @param string $descVehiculo descripcion del vehiculo
     */
    public function setDescVehiculo($descVehiculo) {
        $this->descVehiculo = $descVehiculo;
    }

    /**
     * setPrecio
     * 
     * Ultima revision 04/05/2018
     * Modifica el precio del vehiculo
     * 
     * @param int $precio precio del vehiculo
     */
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    /**
     * setRecogida
     * 
     * Ultima revision 04/05/2018
     * Modifica la recogida del vehiculo
     * 
     * @param date $recogida recogida del vehiculo
     */
    public function setRecogida($recogida) {
        $this->recogida = $recogida;
    }

    /**
     * setEntrega
     * 
     * Ultima revision 04/05/2018
     * Modifica la entrega del vehiculo
     * 
     * @param date $entrega entrega del vehiculo
     */
    public function setEntrega($entrega) {
        $this->entrega = $entrega;
    }

    /**
     * setTipo
     * 
     * Ultima revision 04/05/2018
     * Modifica el tipo del vehiculo
     * 
     * @param strig $tipo tipo del vehiculo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    /**
     * setFoto
     * 
     * Ultima revision 04/05/2018
     * Modifica la foto del vehiculo
     * 
     * @param mediumblob $foto foto del vehiculo
     */
    public function setFoto($foto) {
        $this->foto = $foto;
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
    public static function listarVehiculos($start_from, $limit) {
        $vehiculos = null;
        $vehiculo = VehiculoPDO::listarVehiculos($start_from, $limit);
        if (!empty($vehiculo)) {

            for ($i = 0; $i < count($vehiculo); $i++) {
                $vehiculos[$i] = new Vehiculo($vehiculo[$i]['matricula'], $vehiculo[$i]['codUsuario'], $vehiculo[$i]['marca'], $vehiculo[$i]['plazas'], $vehiculo[$i]['maletas'], $vehiculo[$i]['descVehiculo'], $vehiculo[$i]['precio'], $vehiculo[$i]['recogida'], $vehiculo[$i]['entrega'], $vehiculo[$i]['tipo'], $vehiculo[$i]['foto'],$vehiculo[$i]['registro']);
            }
        }
        return $vehiculos;
    }

    /**
     * buscarVehiculos por tipo
     * 
     * Ultima revision 04/05/2018
     * Busca los vehiculos por tipo
     * 
     * @deprecated since version 1
     * @param string $tipo
     * @return \Vehiculo array con los vehiculos
     */
    public static function buscarVehiculosPorTipo($tipo) {
        $vehiculos = null;
        $vehiculo = VehiculoPDO::buscarVehiculosTipo($tipo);
        if (!empty($vehiculo)) {

            for ($i = 0; $i < count($vehiculo); $i++) {
                $vehiculos[$i] = new Vehiculo($vehiculo[$i]['matricula'], $vehiculo[$i]['codUsuario'], $vehiculo[$i]['marca'], $vehiculo[$i]['plazas'], $vehiculo[$i]['maletas'], $vehiculo[$i]['descVehiculo'], $vehiculo[$i]['precio'], $vehiculo[$i]['recogida'], $vehiculo[$i]['entrega'], $vehiculo[$i]['tipo'], $vehiculo[$i]['foto'],$vehiculo[$i]['registro']);
            }
        }
        return $vehiculos;
    }

    /**
     * buscarVehiculosPorMarca
     * 
     * Ultima revision 04/05/2018
     * Busca los vehiculos por marca
     * 
     * @deprecated since version 1
     * @param string $marca marca del vehiculo
     * @return \Vehiculo array de vehiculos
     */
    public static function buscarVehiculosPorMarca($marca) {
        $vehiculos = null;
        $vehiculo = VehiculoPDO::buscarVehiculosMarca($marca);
        if (!empty($vehiculo)) {

            for ($i = 0; $i < count($vehiculo); $i++) {
                $vehiculos[$i] = new Vehiculo($vehiculo[$i]['matricula'], $vehiculo[$i]['codUsuario'], $vehiculo[$i]['marca'], $vehiculo[$i]['plazas'], $vehiculo[$i]['maletas'], $vehiculo[$i]['descVehiculo'], $vehiculo[$i]['precio'], $vehiculo[$i]['recogida'], $vehiculo[$i]['entrega'], $vehiculo[$i]['tipo'], $vehiculo[$i]['foto'],$vehiculo[$i]['registro']);
            }
        }
        return $vehiculos;
    }

    /**
     * buscarVehiculosMultiBusqueda
     * 
     * Ultima revision 04/05/2018
     * Busca los vehiculos por marca y tipo
     * 
     * @param string $marca marca del vehiculo
     * @param string $tipo tipo del vehiculo
     * @return \Vehiculo
     */
    public static function buscarVehiculosMultiBusqueda($marca, $tipo,$operando, $precio) {

        $vehiculos = null;
        $vehiculo = VehiculoPDO::buscarVehiculosMultiBusqueda($marca, $tipo, $operando, $precio);
        if (!empty($vehiculo)) {

            for ($i = 0; $i < count($vehiculo); $i++) {
                $vehiculos[$i] = new Vehiculo($vehiculo[$i]['matricula'], $vehiculo[$i]['codUsuario'], $vehiculo[$i]['marca'], $vehiculo[$i]['plazas'], $vehiculo[$i]['maletas'], $vehiculo[$i]['descVehiculo'], $vehiculo[$i]['precio'], $vehiculo[$i]['recogida'], $vehiculo[$i]['entrega'], $vehiculo[$i]['tipo'], $vehiculo[$i]['foto'],$vehiculo[$i]['registro']);
            }
        }
        return $vehiculos;
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
    public static function obtenerVehiculo($matricula) {
        $vehiculos = null;
        $vehiculo = VehiculoPDO::obtenerVehiculo($matricula);
        if (!empty($vehiculo)) {

            for ($i = 0; $i < count($vehiculo); $i++) {
                $vehiculos = new Vehiculo($vehiculo[$i]['matricula'], $vehiculo[$i]['codUsuario'], $vehiculo[$i]['marca'], $vehiculo[$i]['plazas'], $vehiculo[$i]['maletas'], $vehiculo[$i]['descVehiculo'], $vehiculo[$i]['precio'], $vehiculo[$i]['recogida'], $vehiculo[$i]['entrega'], $vehiculo[$i]['tipo'], $vehiculo[$i]['foto'], $vehiculo[$i]['registro'] );
            }
        }
        return $vehiculos;
    }

    /**
     * alquilerVehiculo
     * 
     * Ultima revision 04/05/2018
     * Alquila un vehiculo modificando campos en la bd
     * 
     * @param string $usuario usuasrio que alquila el vehiculo
     * @param date $recogida fecha de recogida
     * @param date $entrega fecha de entrega
     * @param string $matricula matricula del vehiculo
     * @return boolean
     */
    public function alquilarVehiculo($usuario, $recogida, $entrega, $matricula,$registro) {
        return VehiculoPDO::alquilarVehiculo($usuario, $recogida, $entrega, $matricula,$registro);
    }

    /**
     * liberarVehiculo
     * 
     *  Ultima revision 04/05/2018
     * Vacia campos de la bd cuando la fecha de alquiler del vehiculo expira o se cancela el alquiler
     * 
     * @param string $matricula matricula del vehiculo
     * @return boolean
     */
    public function liberarVehiculo($matricula) {
        return VehiculoPDO::liberarVehiculo($matricula);
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
    public function modificarVehiculo($matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto) {
        return VehiculoPDO::modificarVehiculo($matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto);
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
    public static function crearVehiculo($matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto) {
        return VehiculoPDO::crearVehiculo($matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto);
    }

    /**
     * eliminarVehiculo
     * 
     * Ultima revision 04/05/2018
     * Elimina un vehiculo
     * 
     * @param string $matricula del vehiculo que se va a eliminar
     * @return boolean
     */
    public function eliminarVehiculo($matricula) {
        return VehiculoPDO::eliminarVehiculo($matricula);
    }
    /**
     * contarVehiculos
     * 
     * Ultima revision 04/05/2018
     * Cuenta los vehiculos para saber cuantas paginas se deben generar en la paginacion
     * 
     * @return int
     */
    public static function contarVehiculos() {
        return VehiculoPDO::contarVehiculos();
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
    
    /**
     * obtenerVehiculo
     * 
     * Ultima revision 04/05/2018
     * Obtiene todos los datos de un vehiculo
     * 
     * @param string $codigo que servirá para identificar el vehiculo del usuario
     * @return \Vehiculo array con datos del vehiculo
     */
    public static function misVehiculos($codigo) {
        $vehiculos = null;
        $vehiculo = VehiculoPDO::misVehiculos($codigo);
        if (!empty($vehiculo)) {

            for ($i = 0; $i < count($vehiculo); $i++) {
                $vehiculos[$i] = new Vehiculo($vehiculo[$i]['matricula'], $vehiculo[$i]['codUsuario'], $vehiculo[$i]['marca'], $vehiculo[$i]['plazas'], $vehiculo[$i]['maletas'], $vehiculo[$i]['descVehiculo'], $vehiculo[$i]['precio'], $vehiculo[$i]['recogida'], $vehiculo[$i]['entrega'], $vehiculo[$i]['tipo'], $vehiculo[$i]['foto'],$vehiculo[$i]['registro']);
            }
        }
        return $vehiculos;
    }

}
