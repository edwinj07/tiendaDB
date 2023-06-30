<?php
require_once ("../config/cone.php");
//clase tienda 

class Tienda{
    //clase constructor
    public function __construct(){

    }
    //funcion insertar datos en la tabla tienda 
    public function insert($nombre_tienda,$fecha_apertura){
        //variable sql codigo para insertar
        $sql="INSERT INTO tb_tienda (nombre_tienda,fecha_apertura,condicion) VALUES
        ('$nombre_tienda','$fecha_apertura','1')";
        return ejecutarConsulta($sql);
    }

    public function update($idtienda,$nombre_tienda,$fecha_apertura){
        //variable sql coidgo para editar
        $sql="UPDATE tb_tienda SET nombre_tienda='$nombre_tienda', fecha_apertura='$fecha_apertura' WHERE idtienda='$idtienda'";
        return ejecutarConsulta($sql);
    }

    public function delete($idtienda){
        //variable sql codigo para eliminar tienda
        $sql="DELETE FROM tb_tienda WHERE idtienda='$idtienda'";
        return ejecutarConsulta($sql);
    }

    public function list(){
        //variable sql codigo para todos los elementos de la tabla
        $sql="SELECT * FROM tb_tienda";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idtienda){
        //variable sql codigo para todos los elementos de la tabla
        $sql="SELECT * FROM tb_tienda WHERE idtienda ='$idtienda'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function select(){
        $sql = "SELECT * FROM tb_tienda WHERE idtienda =idtienda";
        return ejecutarConsulta($sql);
    }
}


?>