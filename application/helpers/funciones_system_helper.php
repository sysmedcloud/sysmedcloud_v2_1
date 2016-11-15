<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//////////////////////////////////////////////////// 
//Convierte fecha de mysql a normal 
//////////////////////////////////////////////////// 
function cambiaf_a_normal($fecha){ 
   	
        $fecha_normal   = explode("-",$fecha);
        $lafecha=@$fecha_normal[2]."/".@$fecha_normal[1]."/".@$fecha_normal[0];
        return $lafecha;
} 

//////////////////////////////////////////////////// 
//Convierte fecha de normal a mysql 
//////////////////////////////////////////////////// 
function cambiaf_a_mysql($fecha){ 
    
        $fecha_mysql = explode("/",$fecha);
        $lafecha=@$fecha_mysql[2]."/".@$fecha_mysql[1]."/".@$fecha_mysql[0];
   	return $lafecha; 
}

//////////////////////////////////////////////////// 
//FUNCION QUE PERMITE CALCULAR LA EDAD
//////////////////////////////////////////////////// 
function calcularEdad($fecha){ 
    
    list($ano,$mes,$dia)    = explode("-",$fecha);
    $ano_diferencia         = date("Y") - $ano;
    $mes_diferencia         = date("m") - $mes;
    $dia_diferencia         = date("d") - $dia;
    
    if ($dia_diferencia < 0 || $mes_diferencia < 0){
        $ano_diferencia--;//1890 - 1980 - 1992 - 0000
    }
    
    return $ano_diferencia;
}

//////////////////////////////////////////////////// 
//PERMITE CONTROLAR LAS ACTIVE DE NUESTRO MENU
//////////////////////////////////////////////////// 
function activeMenu($nom_menu){

    //el parametro que recibimos debe existir en nuestro arreglo 
    // con las opciones del menu, debe tener el mismo nombre
    // de lo contrario no marcara la opcion como active

    //arreglo con todas las opciones de nuestro menu
    $data_menu = array(
        "inicio",//modulo de inicio
        "perfil",//modulo mi perfil
        "calendario",//modulo calendario
        "pacientes",//modulo paciente
        "consulta",//modulo consulta
        "gestion",//modulo gestion de datos
        "reportes",//modulo de reportess
        "soporte"//modulo soporte
    );

    //recorre nuestro arreglo
    foreach ($data_menu as $row){

        //si el parametro recibido es igual a una de las opciones
        //de nuestro arreglo (menu) marcamos la opcion como active
        if($row == $nom_menu){//colocar la clase active

            $arr_menu[$row] = "active";

        }else{//no colocar la clase active

            $arr_menu[$row] = "";
        }         
    }

    return $arr_menu;//retonar nuestro arreglo menu
}

//////////////////////////////////////////////////// 
//Formatear una fecha a microtime para añadir al 
//evento, tipo 1401517498985
//////////////////////////////////////////////////// 
function _formatear($fecha){
    
    date_default_timezone_set("Chile/Continental");
    
    return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}

//////////////////////////////////////////////////// 
//Evaluar los datos que ingresa el usuario y 
//eliminamos caracteres no deseados
////////////////////////////////////////////////////
function evaluar($valor){
    
    $nopermitido = array("'",'\\','<','>',"\"");
    $valor = str_replace($nopermitido, "", $valor);
    return $valor;
}

//end application/helpers/funciones.php