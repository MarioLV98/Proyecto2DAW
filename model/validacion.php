<?php
/**
 * Fichero validacion.php
 * 
 * Validacion
 * 
 * @package modelo
 */
  
/**
 * Sirve para limpiar campos
 * 
 * @param $valor valor que se pasa
 * @return 
 */
 function limpiarCampos($valor) {
    return htmlspecialchars(strip_tags(trim($valor)));
}

/**
 * validarCadenaAlfanumerica
 * 
 * Sirve para validar una cadena alfanumerica
 * 
 * @param $valor que se le pasa
 * @param $minimo tamaño minimo de la cadena
 * @param $maximo tamaño maximo de la cadena
 * @return string con el resultado de la validacion
 */
function validarCadenaAlfanumerica($valor, $minimo, $maximo) {
     $valida = "";
    $patron_texto = "/^[0-9a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ\s]+$/";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!preg_match($patron_texto, $valor)) {
        $valida = "Cadena no valida";
    } else if (strlen($valor) < $minimo) {
        $valida = "Tamaño minimo $minimo";
    } else if (strlen($valor) > $maximo) {
        $valida = "Tamaño maximo $maximo";
    }
    return $valida;
}

/**
 * validarCadenaAlfabetica
 * 
 * Sirve para validar una cadena alfabetica
 * 
 * @param $valor que se le pasa
 * @param $minimo tamaño minimo de la cadena
 * @param $maximo tamaño maximo de la cadena
 * @return string con el resultado de la validacion
 */
function validarCadenaAlfabetica($valor, $minimo, $maximo) {
    $valida = "";
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ\s]+$/";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!preg_match($patron_texto, $valor)) {
        $valida = "Cadena no valida";
    } else if (strlen($valor) < $minimo) {
        $valida = "Tamaño minimo $minimo";
    } else if (strlen($valor) > $maximo) {
        $valida = "Tamaño maximo $maximo";
    }
    return $valida;
}

/**
 * validarEntero
 * 
 * Sirve para validar un entero
 * 
 * @param $valor que se le pasa
 * @param $minimo tamaño minimo de la cadena
 * @param $maximo tamaño maximo de la cadena
 * @return string con el resultado de la validacion
 */
function validarEntero($valor, $minimo, $maximo) {
    $valida = "";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!filter_var($valor, FILTER_VALIDATE_INT)) {
        $valida = "No ha introducido un entero";
    } else if ($valor < $minimo) {
        $valida = "Tamaño $minimo";
    } else if ($valor > $maximo) {
        $valida = "Tamaño $maximo";
    }
    return $valida;
}

/**
 * validarReal
 * 
 * Sirve para validar una cadena un decimal
 * 
 * @param $valor que se le pasa
 * @param $minimo tamaño minimo de la cadena
 * @param $maximo tamaño maximo de la cadena
 * @return string con el resultado de la validacion
 */
function validarReal($valor, $minimo, $maximo) {
    $valida = "";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!filter_var($valor, FILTER_VALIDATE_FLOAT)) {
        $valida = "No ha introducido un numero real";
    } else if ($valor < $minimo) {
        $valida = "Tamaño minimo $minimo";
    } else if ($valor > $maximo) {
        $valida = "Tamaño maximo $maximo";
    }
    return $valida;
}

/**
 * validarBooleano
 * 
 * Sirve para validar un booleano
 * 
 * @param $valor que se le pasa
 * @return string con el resultado de la validacion
 */
function validarBooleano($valor) {
    $valida = "";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!filter_var($valor, FILTER_VALIDATE_BOOLEAN)) {
        $valida = "No es un booleano";
    }
    return $valida;
}

/**
 * validarURL
 * 
 * Sirve para validar una URL
 * 
 * @param $valor que se le pasa
 * @return string con el resultado de la validacion
 */
function validarURL($valor) {
    $valida = "";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!filter_var($valor, FILTER_VALIDATE_URL)) {
        $valida = "URL no valida";
    }
    return $valida;
}

/**
 * validarEmail
 * 
 * Sirve para validar un email
 * 
 * @param $valor que se le pasa
 * @return string con el resultado de la validacion
 */

function validarEmail($valor) {
    $valida = "";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
        $valida = "Email no valido";
    }
    return $valida;
}

/**
 * validarDNI
 * 
 * Sirve para validar un DNI
 * 
 * @param $valor que se le pasa
 * @return string con el resultado de la validacion
 */
function validarDNI($valor) {
    $letra = substr($valor, -1);
    $numeros = substr($valor, 0, -1);
    $valida = "";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8 )) {
        $valida = "Dni no valido";
    }
    return $valida;
}
/**
 * validarTelefono
 * 
 * Sirve para validar un telefono
 * 
 * @param $valor que se le pasa
 * @return string con el resultado de la validacion
 */
function validarTelefono($valor) {
    $valida = "";
    $patron = "/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/";
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else if (!preg_match($patron, $valor)) {
        $valida = "Telefono no valido";
    }
    return $valida;
}

function noVacio($valor){
    if (empty($valor)) {
        $valida = "No ha introducido ningun valor";
    } else {
        $valida = "";
    }
    return $valida; 
}



?>