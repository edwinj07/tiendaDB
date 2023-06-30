<?php
require_once("../models/Producto.php");

$producto = new Producto();//objeto producto

$nombre_producto=isset($_POST["nombreproducto"])?limpiarCadena($_POST["nombreproducto"]):"";
$sku=isset($_POST["sku"])?limpiarCadena($_POST["sku"]):"";
$descripcion=isset($_POST["descripcion"])?limpiarCadena($_POST["descripcion"]):"";
$valor=isset($_POST["valor"])?limpiarCadena($_POST["valor"]):"";
$foto=isset($_POST["foto"])?limpiarCadena($_POST["foto"]):"";
$idtienda=isset($_POST["idtienda"])?limpiarCadena($_POST["idtienda"]):"";
$imagenactual = isset($_POST["imagenactual"]) ? limpiarCadena($_POST["imagenactual"]) : "";

switch($_GET["op"]){
    case 'guardareditar':

        // Obtiene el nombre actual de la foto desde el formulario      

        // Verifica si se ha cargado una nueva foto
        if (!empty($_FILES["foto"]["tmp_name"])) {
            $ruta_destino = "../files/productos/";
            $nombre_archivo = $_FILES["foto"]["name"];

        // Mueve el archivo de la foto al directorio de destino
            move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_destino . $nombre_archivo);

            // Actualiza el valor de la foto con el nuevo nombre del archivo
            $foto = $nombre_archivo;
        } else {
            // Si no se ha cargado una nueva foto, utiliza la foto actual
            $foto = $imagenactual;
        }
        //sentencia de control if para guardar y editar la foto
        if(!file_exists($_FILES["foto"]["tmp_name"]) || !is_uploaded_file($_FILES["foto"]["tmp_name"])) {
            $foto=$_POST["imagenactual"];
        }else{
            $ext=explode(':',$_FILES["foto"]["name"]);
            if($_FILES['foto']['type'] == "image/jpg" || $_FILES['foto']['type'] == "image/jpeg" || $_FILES['foto']['type'] == "image/png"){
                $foto=round(microtime(true)) . '.' .end($ext);
                move_uploaded_file($_FILES["foto"]["tmp_name"],"../files/productos/" .$foto);
            }
        }
        //sentencia de control if para insertar y editar
        if(empty($sku)){
            $respuesta=$producto->insert($nombre_producto,$descripcion,$valor,$foto,$idtienda);
            echo $respuesta?"Producto registrada":"Producto no se pudo guardar";
        }else{
            $respuesta=$producto->update($nombre_producto,$sku,$descripcion,$valor,$foto,$idtienda);
            echo $respuesta?"producto actualizada":"producto no se pudo actualizar";
        }

    break;

    case 'activar':
        $respuesta=$producto->activar($sku);
        echo $respuesta?"Activar":" nose pudo activar";
        break;
    case 'deactivar':
        $respuesta=$producto->desactivar($sku);
        echo $respuesta?"desactivar":"nose pudo desactivar";
        break;    

    case 'eliminar':

        $respuesta=$producto->delete($sku);
        echo $respuesta?"producto eliminada":"producto no se pudo eliminar";
    break;

    case 'mostrar':
        $respuesta=$producto->mostrar($sku);
        echo json_encode($respuesta);
    break;

    case 'listar':
        # code...   
 
       $respuesta=$producto->list();

       $data=Array();

       while($res=$respuesta->fetch_object()){
        
        $data[]=array(
            
            "0"=>'<button type="button" onClick="mostrar('.$res->sku.');"  id="'.$res->sku.'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>'.
            '<button type="button" onClick="eliminar('.$res->sku.');"  id="'.$res->sku.'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-trash"></i></div></button>',
            "1"=>$res->nombre_producto,
            "2"=>$res->sku,
            "3"=>$res->descripcion,
            "4"=>$res->valor,
            //"5" =>$res->foto,
            "6"=>$res->tienda,
            "7"=>($res->condicion)?'<span class="label bg-green">Activado</span>':
            '<span class="label bg-red">Desactivado</span>'                     

        );
       }
       $result=array(
           "echo"=>0,
           "totalRecords"=>count($data),
           "iTotalDisplayRecords"=>count($data),
           "aaData"=>$data);

           echo json_encode($result);       

    break;


    case 'selectProdu':
        require_once ("../models/Tienda.php");

        $tienda=new Tienda();
        $respuesta=$tienda->select();
        
            while($res=$respuesta->fetch_object()){

                echo '<option value='.$res->idtienda.'>'.$res->nombre_tienda.'</option>';
            }
    break;

}

?>