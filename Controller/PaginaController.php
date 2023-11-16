<?php
namespace Controller;

use Model\EnlacesModel;

class PaginaController{


    public function mostrarInicio(){
        require_once("View/template.php");
    }

    public function enlacesPagina(){

        if(isset($_GET['action'])){
            $enlace=$_GET['action'];
        }else{
            $enlace='inicio';
        }
        $respuesta=EnlacesModel::enlacesPagina($enlace);
        require_once($respuesta);
    }

}

?>