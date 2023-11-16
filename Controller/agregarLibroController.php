<?php 
namespace Controller;

use Model\agregarLibroModel;

Class agregarLibroController{

    public function agregar(){
        if(!empty($_POST['titulo'])&& !empty($_POST['idcategoria'])){

            $datos=array(
                "titulo"=>$_POST['titulo'],
                "categoria"=>$_POST['idcategoria']
            );
            $respuesta= agregarLibroModel::agregarLibro($datos);
            return $respuesta ? "guardado" : "error";
        }


    }
}


?>