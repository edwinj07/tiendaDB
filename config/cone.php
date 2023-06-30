<?php

//funcion require once para declarar el archivo global de las constantes globales de la conexion a base de datos

require_once ('global.php');

$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DBNAME);
//variable de conexion con la clase de conexion mysqli y los parametros de la constante global

mysqli_query($conexion,'SET NAMES"'.DB_ENCODE.'"');
//sentencia de control if para determinar si hay un error al momento de conectar a la base de datos
if(mysqli_connect_errno()){
    //impresion para mostrar el error que tiene
    printf("fallo de conexion a la base de datos: %s\n",mysqli_connect_errno());
    exit();
}
//sentencia de control if si la conexion es exitosa pueda ejecutar estas funciones de interacion
if(!function_exists('ejecutarconsulta')){

    //funcion para devolver todos los usuarios
    function ejecutarConsulta($sql) {

        global $conexion;
        $query=$conexion->query($sql);
        return $query;
    }
    //funcion para devolver un unico registro
    function ejecutarConsultaSimpleFila($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		$row = $query->fetch_assoc();
		return $row;
	}
    // function ejecutarConsultaUnica($sql){
    //     global $conexion;
    //     $query=$conexion->query($sql);
    //     $row=$query->fetch_assoc();
    //     return $row;
    // }
    //funcion para devolver el registro de un id
    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $query=$conexion->query($sql);
        return $conexion->insert_id;
    }

    function limpiarCadena($str) {
        global $conexion;
        $str=mysqli_real_escape_string($conexion,trim($str));
        return htmlspecialchars($str);
    }


}

?>