<?php
require_once ("../config/cone.php");
//clase producto model de la tabla de la base de datos 

class Producto{
    //clase constructor
    public function __construct(){

    }
    //funcion insertar datos en la tabla producto 
    public function insert($nombre_producto,$descripcion,$valor,$foto,$idtienda){
        //variable sql codigo para insertar
        $sql="INSERT INTO tb_productos (nombre_producto,descripcion,valor,foto,idtienda,condicion) VALUES
        ('$nombre_producto','$descripcion','$$valor','$foto','$idtienda','1')";
        return ejecutarConsulta($sql);
    }

    public function update($nombre_producto,$sku,$descripcion,$valor,$foto,$idtienda){
        //variable sql coidgo para editar
        $sql="UPDATE tb_productos SET nombre_producto='$nombre_producto', descripcion='$descripcion',valor='$valor',
        foto='$foto',idtienda='$idtienda' WHERE sku='$sku'";
        return ejecutarConsulta($sql);
    }

    public function delete($sku){
        //variable sql codigo para eliminar producto
        $sql="DELETE FROM tb_productos WHERE sku='$sku'";
        return ejecutarConsulta($sql);
    }

    public function list(){
        //variable sql codigo para realizar inner join para las tablas relacionadas
        $sql="SELECT  t.idtienda,t.nombre_tienda as tienda,p.sku,p.nombre_producto,p.descripcion,p.valor,p.foto,p.condicion  FROM 
        tb_productos p INNER JOIN tb_tienda t ON p.idtienda = t.idtienda";
        return ejecutarConsulta($sql);
    }

    public function mostrar($sku){
        //variable sql codigo para todos los elementos de la tabla id de la tabla
        $sql="SELECT * FROM tb_productos WHERE sku ='$sku'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function activar($sku){
        $sql ="UPDATE tb_productos SET condicion='1' WHERE sku ='$sku'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($sku){
        $sql ="UPDATE tb_productos SET condicion='0' WHERE sku ='$sku'";
        return ejecutarConsulta($sql);
    }

    
}
?>