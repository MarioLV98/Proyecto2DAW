<?php

/**
 * Fichero VehiculoPDO.php
 * 
 * Creacion usuarios
 * 
 * @package modelo
 */

/**
 * Clase VehiculoPDO
 * 
 * Clase para crear,modificar,borrar,alquilar,liberar vehiculos
 * 
 * @author Mario Labra Villar
 */
class VehiculoPDO {

    /**
     * Funcion para listar vehiculos
     * 
     * Ultima revision 26/04/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, lista los vehiculos
     * 
     * @author Mario Labra Villar
     * @param integer $start_from desde donde empieza a listar(debido a la paginacion)
     * @param integer $limit donde termina de listar (debido a la paginacion)
     * @return array $VEHICULO array de vehiculos
     */
    public static function listarVehiculos($start_from, $limit) {

        $consulta = "Select * from Vehiculos limit $start_from,$limit";
        $arrayVehiculo = [];
        $resultado = DBPDO::ejecutarConsulta($consulta, [$start_from, $limit]);
        $VEHICULO = [];
        $i = 0;
        if ($resultado->rowCount() > 0) {

            while ($objeto = $resultado->fetchObject()) {
                $arrayVehiculo['matricula'] = $objeto->matricula;
                $arrayVehiculo['codUsuario'] = $objeto->codUsuario;
                $arrayVehiculo['marca'] = $objeto->marca;
                $arrayVehiculo['plazas'] = $objeto->plazas;
                $arrayVehiculo['maletas'] = $objeto->maletas;
                $arrayVehiculo['descVehiculo'] = $objeto->descVehiculo;
                $arrayVehiculo['precio'] = $objeto->precio;
                $arrayVehiculo['recogida'] = $objeto->recogida;
                $arrayVehiculo['entrega'] = $objeto->entrega;
                $arrayVehiculo['tipo'] = $objeto->tipo;
                $arrayVehiculo['foto'] = $objeto->foto;
                $VEHICULO[$i] = $arrayVehiculo;
                $i++;
            }
        }

        return $VEHICULO;
    }

    /**
     * Funcion para buscar vehiculos por tipo
     * 
     * Ultima revision 26/04/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, busca los vehiculos por tipo
     * 
     * @deprecated since version 1.0
     * @author Mario Labra Villar 
     * @param string $tipo tipo dee vehiculo que le estamos pasando
     * @return array $VEHICULO array de vehiculos
     */
    public static function buscarVehiculosTipo($tipo) {

        $consulta = "Select * from Vehiculos where tipo = ?";
        $arrayVehiculo = [];
        $resultado = DBPDO::ejecutarConsulta($consulta, [$tipo]);
        $VEHICULO = [];
        $i = 0;
        if ($resultado->rowCount() > 0) {

            while ($objeto = $resultado->fetchObject()) {
                $arrayVehiculo['matricula'] = $objeto->matricula;
                $arrayVehiculo['codUsuario'] = $objeto->codUsuario;
                $arrayVehiculo['marca'] = $objeto->marca;
                $arrayVehiculo['plazas'] = $objeto->plazas;
                $arrayVehiculo['maletas'] = $objeto->maletas;
                $arrayVehiculo['descVehiculo'] = $objeto->descVehiculo;
                $arrayVehiculo['precio'] = $objeto->precio;
                $arrayVehiculo['recogida'] = $objeto->recogida;
                $arrayVehiculo['entrega'] = $objeto->entrega;
                $arrayVehiculo['tipo'] = $objeto->tipo;
                $arrayVehiculo['foto'] = $objeto->foto;
                $VEHICULO[$i] = $arrayVehiculo;
                $i++;
            }
        }

        return $VEHICULO;
    }

    /**
     * Funcion para buscar vehiculos por marca
     * 
     * Ultima revision 26/04/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, busca los vehiculos por marca
     * 
     * @deprecated since version 1.0
     * @author Mario Labra Villar 
     * @param string $marca marca de vehiculo que le estamos pasando
     * @return array $VEHICULO array de vehiculos
     */
    public static function buscarVehiculosMarca($marca) {

        $consulta = "Select * from Vehiculos where marca like ?";
        $arrayVehiculo = [];
        $resultado = DBPDO::ejecutarConsulta($consulta, ['%' . $marca . '%']);
        $VEHICULO = [];
        $i = 0;
        if ($resultado->rowCount() > 0) {

            while ($objeto = $resultado->fetchObject()) {
                $arrayVehiculo['matricula'] = $objeto->matricula;
                $arrayVehiculo['codUsuario'] = $objeto->codUsuario;
                $arrayVehiculo['marca'] = $objeto->marca;
                $arrayVehiculo['plazas'] = $objeto->plazas;
                $arrayVehiculo['maletas'] = $objeto->maletas;
                $arrayVehiculo['descVehiculo'] = $objeto->descVehiculo;
                $arrayVehiculo['precio'] = $objeto->precio;
                $arrayVehiculo['recogida'] = $objeto->recogida;
                $arrayVehiculo['entrega'] = $objeto->entrega;
                $arrayVehiculo['tipo'] = $objeto->tipo;
                $arrayVehiculo['foto'] = $objeto->foto;
                $VEHICULO[$i] = $arrayVehiculo;
                $i++;
            }
        }

        return $VEHICULO;
    }

    /**
     * Funcion para buscar vehiculos por marca y tipo combinando ambas o por separado
     * 
     * Ultima revision 26/04/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, combina los dos tipos de busqueda dependiendo de los parametros que pases
     * 
     * @author Mario Labra Villar 
     * @param string $marca marca de vehiculo que le estamos pasando
     * @param string $tipo tipo dee vehiculo que le estamos pasando
     * @return array $VEHICULO array de vehiculos
     */
    public static function buscarVehiculosMultiBusqueda($marca, $tipo,$operando,$precio) {

        $consulta = "Select * from Vehiculos where marca like ? and tipo like ? and precio $operando $precio";
        $arrayVehiculo = [];
        $resultado = DBPDO::ejecutarConsulta($consulta, ['%' . $marca . '%', '%' . $tipo . '%']);
        $VEHICULO = [];
        $i = 0;
        if ($resultado->rowCount() > 0) {

            while ($objeto = $resultado->fetchObject()) {
                $arrayVehiculo['matricula'] = $objeto->matricula;
                $arrayVehiculo['codUsuario'] = $objeto->codUsuario;
                $arrayVehiculo['marca'] = $objeto->marca;
                $arrayVehiculo['plazas'] = $objeto->plazas;
                $arrayVehiculo['maletas'] = $objeto->maletas;
                $arrayVehiculo['descVehiculo'] = $objeto->descVehiculo;
                $arrayVehiculo['precio'] = $objeto->precio;
                $arrayVehiculo['recogida'] = $objeto->recogida;
                $arrayVehiculo['entrega'] = $objeto->entrega;
                $arrayVehiculo['tipo'] = $objeto->tipo;
                $arrayVehiculo['foto'] = $objeto->foto;
                $VEHICULO[$i] = $arrayVehiculo;
                $i++;
            }
        }

        return $VEHICULO;
    }

    /**
     * Funcion para buscar obtener un vehiculo
     * 
     * Ultima revision 26/04/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, obtiene todos los datos de un vehiculo
     * 
     * @author Mario Labra Villar 
     * @param string $matricula matricula del vehiculo que le estamos pasando
     * @return array $VEHICULO array de vehiculos
     */
    public static function obtenerVehiculo($matricula) {

        $consulta = "Select * from Vehiculos where matricula= ?";
        $arrayVehiculo = [];
        $resultado = DBPDO::ejecutarConsulta($consulta, [$matricula]);
        $VEHICULO = [];
        $i = 0;
        if ($resultado->rowCount() > 0) {

            while ($objeto = $resultado->fetchObject()) {
                $arrayVehiculo['matricula'] = $objeto->matricula;
                $arrayVehiculo['codUsuario'] = $objeto->codUsuario;
                $arrayVehiculo['marca'] = $objeto->marca;
                $arrayVehiculo['plazas'] = $objeto->plazas;
                $arrayVehiculo['maletas'] = $objeto->maletas;
                $arrayVehiculo['descVehiculo'] = $objeto->descVehiculo;
                $arrayVehiculo['precio'] = $objeto->precio;
                $arrayVehiculo['recogida'] = $objeto->recogida;
                $arrayVehiculo['entrega'] = $objeto->entrega;
                $arrayVehiculo['tipo'] = $objeto->tipo;
                $arrayVehiculo['foto'] = $objeto->foto;
                $VEHICULO[$i] = $arrayVehiculo;
                $i++;
            }
        }

        return $VEHICULO;
    }

    /**
     *  Funcion para alquilar un vehiculo
     * 
     * Ultima revision 26/04/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, inserta datos en cada vehiculo para saber si esta alquilado
     * 
     * @param string $usuario usuario que alquila el vehiculo
     * @param date $recogida fecha de recogida del vehiculo
     * @param date $entrega fecha de entrega del vehiculo
     * @param string $matricula matricula del vehiculo que se va alquilar
     * @return boolean $resultado
     */
    public static function alquilarVehiculo($usuario, $recogida, $entrega, $matricula) {

        $modificacionOk = true;
        $consulta = "update Vehiculos set codUsuario='$usuario',recogida='$recogida',entrega='$entrega' where matricula='$matricula'";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$usuario, $recogida, $entrega, $matricula]);


        if ($resultado->rowCount() != 1) {
            $modificacionOk = false;
        }

        return $resultado;
    }

    /**
     * Funcion para sacar a un vehiculo del estado de alquiler
     * 
     * Ultima revision 03/05/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, borra los datos de alquiler del vehiculo
     * 
     * @param string $matricula matricula del vehiculo a liberar
     * @return boolean $resultado
     */
    public static function liberarVehiculo($matricula) {

        $modificacionOk = true;
        $consulta = "update Vehiculos set codUsuario=null,recogida=null,entrega=null where matricula='$matricula'";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$matricula]);


        if ($resultado->rowCount() != 1) {
            $modificacionOk = false;
        }

        return $resultado;
    }

    /**
     * Funcion para modificar los datos de un vehiculo
     * 
     * 
     * Ultima revision 03/05/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, modifica los datos del vehiculo
     * 
     * @param string $matricula matricula del vehiculo
     * @param string $marca marca  del vehiculo
     * @param string $plazas plazas del vehiculo
     * @param string $maletas maletas que caben en el vehiculo
     * @param string $descripcion descripcion del vehiculo
     * @param string $precio precio del vehiculo
     * @param string $tipo tipo de vehiculo
     * @param mediumblob $foto imagen del vehiculo
     * @return boolean $resultado
     */
    public static function modificarVehiculo($matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto) {

        $modificacionOk = true;
        if (!empty($foto)) {
            $consulta = "update Vehiculos set marca='$marca',plazas='$plazas',maletas='$maletas', descVehiculo='$descripcion',precio='$precio',tipo='$tipo', foto='$foto' where matricula='$matricula'";
        } else {
            $consulta = "update Vehiculos set marca='$marca',plazas='$plazas',maletas='$maletas', descVehiculo='$descripcion',precio='$precio',tipo='$tipo' where matricula='$matricula'";
        }
        $resultado = DBPDO::ejecutarConsulta($consulta, [$matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto]);


        if ($resultado->rowCount() != 1) {
            $modificacionOk = false;
        }

        return $resultado;
    }

    /**
     * Funcion para crear un vehiculo
     * 
     * 
     * Ultima revision 03/05/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, crea un vehiculo
     * 
     * @param string $matricula matricula del vehiculo
     * @param string $marca marca  del vehiculo
     * @param string $plazas plazas del vehiculo
     * @param string $maletas maletas que caben en el vehiculo
     * @param string $descripcion descripcion del vehiculo
     * @param string $precio precio del vehiculo
     * @param string $tipo tipo de vehiculo
     * @param mediumblob $foto imagen del vehiculo
     * @return boolean $modificacionOk
     */
    public static function crearVehiculo($matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto) {

        $modificacionOk = true;
        $consulta = "insert into Vehiculos (matricula,marca,plazas,maletas,descVehiculo,precio,tipo,foto) values (?,?,?,?,?,?,?,?)";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$matricula, $marca, $plazas, $maletas, $descripcion, $precio, $tipo, $foto]);


        if ($resultado->rowCount() != 1) {
            $modificacionOk = false;
        }

        return $modificacionOk;
    }

    /**
     * Funcion para eliminar un vehiculo
     * 
     * Ultima revision 03/05/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, crea un vehiculo
     * 
     * @param string $matricula matricula del vehiculo a eliminar
     * @return boolean $borradoOk 
     */
    public static function eliminarVehiculo($matricula) {

        $borradoOk = false;
        $consulta = "delete from Vehiculos where matricula=?";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$matricula]);
        if ($resultado->rowCount() != 0) {
            $borradoOk = true;
        }

        return $borradoOk;
    }

    /**
     * Funcion para contar vehiculos
     * 
     * Ultima revision 03/05/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, cuenta los vehiculos
     * 
     * @return int $numero
     */
    public static function contarVehiculos() {
        $consulta = "Select * from Vehiculos";

        $resultado = DBPDO::ejecutarConsulta($consulta, []);

        $numero = $resultado->rowCount();

        return $numero;
    }

    /**
     * Funcion para comprobar que un vehiculo ya existe
     * 
     * Ultima revision 04/05/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar
     * 
     * @param $valor matricula del vehiculo
     * @return string con el resultado de la validacion
     */
    public static function comprobarYaExistente($valor) {
        $valida = "";

        if (empty($valor)) {
            $valida = "No ha introducido ningun valor";
        } else {

            $consulta = "select * from Vehiculos where matricula ='$valor'";
            $resultado = DBPDO::ejecutarConsulta($consulta, [$valor]);
            if ($resultado->rowCount() == 1) {

                $valida = "Ya hay un vehiculo con esa matricula";
            }
        }

        return $valida;
    }

}
