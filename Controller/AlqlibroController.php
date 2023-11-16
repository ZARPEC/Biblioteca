<?php

namespace Controller;
use Model\alquilarlibroModel;

class AlqlibroController{

    public function Alquilar(){
        if( !empty($_POST['idlibro'])){
            $datos2 = array(
                "idlib" => $_POST['idlibro'],
                "fecha" => date("Y/m/d")
            );
            $respuesta = alquilarlibroModel::guardarAlquiler($datos2);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function mostrar(){
        $libro = alquilarlibroModel::mostrarAlquiler();
        return $libro;//se van a la vista
    }

    public function editar(){
        $idAlquiler = $_GET['idAlquiler'];
        $Alquiler = alquilarlibroModel::editarAlquiler($idAlquiler);
        return $Alquiler;
    }

    public function actualizar(){
        if( !empty($_POST['idalquiler']) && !empty($_POST['idlibro']) ){
            $datos = array(
                "idalquiler" => $_POST['idalquiler'],
                "idlibro" => $_POST['idlibro'],
                "idusuario" => $_SESSION['id']
            );
            //Enviando los datos al modelo, para que se actualice el registro.
            $respuesta = alquilarlibroModel::actualizarAlquiler($datos);

            if($respuesta){ header("Location: index.php?action=verAlquiler"); }
        }
    }

    public function borrar(){
        if( !empty($_GET['idAlquiler'])){
            $alquiler = alquilarlibroModel::borrarInscripcion($_GET['idAlquiler']);
            return $alquiler;
        }
    }

    public function confirmarBorrar(){
        if( !empty($_POST['idAlquiler'])){
            $alquiler = alquilarlibroModel::borrarConfirmadoAlquiler($_POST['idAlquiler']);
            if($alquiler){ header("Location: index.php?action=verAlquiler"); }
        }
        
    }

}

?>