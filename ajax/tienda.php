<?php

require_once("../models/Tienda.php");

$tienda = new Tienda();//objeto tienda

$idtienda=isset($_POST["idtienda"])?limpiarCadena($_POST["idtienda"]):"";
$nombre_tienda=isset($_POST["nombretienda"])?limpiarCadena($_POST["nombretienda"]):"";
$fecha_apertura=isset($_POST["fecha"])?limpiarCadena($_POST["fecha"]):"";

switch($_GET["op"]){
    case 'guardareditar':
        //sentencia de control if para insertar y editar
        if(empty($idtienda)){
            $respuesta=$tienda->insert($nombre_tienda,$fecha_apertura);
            echo $respuesta?"Tienda registrada":"Tienda no se pudo guardar";
        }else{
            $respuesta=$tienda->update($idtienda,$nombre_tienda,$fecha_apertura);
            echo $respuesta?"Tienda actualizada":"Tienda no se pudo actualizar";
        }

    break;

    case 'eliminar':

        $respuesta=$tienda->delete($idtienda);
        echo $respuesta?"Tienda eliminada":"Tienda no se pudo eliminar";
    break;

    case 'mostrar':
        $respuesta=$tienda->mostrar($idtienda);
        echo json_encode($respuesta);
    break;

    case 'listar':
        # code...
       $respuesta=$tienda->list();

       $data=Array();

       while($res=$respuesta->fetch_object()){
        $data[]=array(
            
            "0"=>'<button type="button" onClick="mostrar('.$res->idtienda.');"  id="'.$res->idtienda.'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>'.
            '<button type="button" onClick="eliminar('.$res->idtienda.');"  id="'.$res->idtienda.'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-trash"></i></div></button>',
            "1"=>$res->nombre_tienda,
            "2"=>$res->fecha_apertura,              
        );
       }
       $result=array(
           "echo"=>1,
           "totalrecords"=>count($data),
           "iTotalDisplayRecords"=>count($data),
           "aaData"=>$data);

           echo json_encode($result);       

    break;

}





?>