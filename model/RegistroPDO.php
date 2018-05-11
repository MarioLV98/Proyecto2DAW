<?php

/**
 * Fichero RegistroPDO.php
 * 
 * Creacion usuarios
 * 
 * @package modelo
 */

/**
 * Clase RegistroPDO
 * 
 * Clase para crear,modificar,borrar,alquilar,liberar vehiculos
 * 
 * @author Mario Labra Villar
 */
class RegistroPDO {

    /**
     * Funcion para listar vehiculos
     * 
     * Ultima revision 26/04/2018
     * Se crea la consulta y se le añaden los parametros que la clase DBPDO va a ejecutar, lista los vehiculos
     * 
     * @author Mario Labra Villar
     * @return array $REGISTRO array de registros
     */
    public static function listarRegistros() {

        $consulta = "Select * from Registros";
        $arrayRegistro = [];
        $resultado = DBPDO::ejecutarConsulta($consulta, []);
        $REGISTRO = [];
        $i = 0;
        if ($resultado->rowCount() > 0) {

            while ($objeto = $resultado->fetchObject()) {
                $arrayRegistro['codAlquiler'] = $objeto->codAlquiler;
                $arrayRegistro['codUsuario'] = $objeto->codUsuario;
                $arrayRegistro['matricula'] = $objeto->matricula;
                $arrayRegistro['nombre'] = $objeto->nombre;
                $arrayRegistro['marca'] = $objeto->marca;
                $arrayRegistro['desde'] = $objeto->desde;
                $arrayRegistro['hasta'] = $objeto->hasta;
                $arrayRegistro['precio'] = $objeto->precio;
                $arrayRegistro['total'] = $objeto->total;
                $REGISTRO[$i] = $arrayRegistro;
                $i++;
            }
        }

        return $REGISTRO;
    }

    

   public static function nuevoRegistro($codAlquiler,$codUsuario,$matricula,$nombre,$marca,$desde,$hasta,$precio,$total){
       
        $consulta = "insert into Registros (codAlquiler,codUsuario,matricula,nombre,marca,desde,hasta,precio,total) values (?,?,?,?,?,?,?,?,?)";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codAlquiler,$codUsuario,$matricula,$nombre,$marca,$desde,$hasta,$precio,$total]);


        if ($resultado->rowCount() != 1) {
            $modificacionOk = false;
        }

        return $modificacionOk;
       
   }
   
      public static function modificarRegistro($codAlquiler,$hasta,$total){
       
        $consulta = "update Registros set hasta='$hasta',total='$total' where codAlquiler='$codAlquiler'";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codAlquiler,$hasta,$total]);


        if ($resultado->rowCount() != 1) {
            $modificacionOk = false;
        }

        return $modificacionOk;
       
   }
   
       public static function maxRegistros() {
        $consulta = "select max(codAlquiler) from Registros";
       
        $resultado = DBPDO::ejecutarConsulta($consulta, []);
        
        $numero = $resultado->fetch();

        return $numero;
     }
     
     public static function obtenerRegistro($cod) {

        $consulta = "Select *  from Registros where codAlquiler='$cod'";
        $arrayRegistro = [];
        $resultado = DBPDO::ejecutarConsulta($consulta, [$cod]);
        $REGISTRO = [];
        $i = 0;
        if ($resultado->rowCount() > 0) {

            while ($objeto = $resultado->fetchObject()) {
                $arrayRegistro['codAlquiler'] = $objeto->codAlquiler;
                $arrayRegistro['codUsuario'] = $objeto->codUsuario;
                $arrayRegistro['matricula'] = $objeto->matricula;
                $arrayRegistro['nombre'] = $objeto->nombre;
                $arrayRegistro['marca'] = $objeto->marca;
                $arrayRegistro['desde'] = $objeto->desde;
                $arrayRegistro['hasta'] = $objeto->hasta;
                $arrayRegistro['precio'] = $objeto->precio;
                $arrayRegistro['total'] = $objeto->total;
                $REGISTRO[$i] = $arrayRegistro;
                $i++;
            }
        }

        return $REGISTRO;
    }
    


}
