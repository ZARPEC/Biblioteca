<?php

namespace Controller;
use Model\alquilarlibroModel;

class AlqCarroController{

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
        $inscripcion = alquilarlibroModel::mostrarAlquiler();
        return $inscripcion;//se van a la vista
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
            $inscripcion = alquilarlibroModel::borrarInscripcion($_GET['idAlquiler']);
            return $inscripcion;
        }
    }

    public function confirmarBorrar(){
        if( !empty($_POST['idAlquiler'])){
            $inscripcion = alquilarlibroModel::borrarConfirmadoAlquiler($_POST['idAlquiler']);
            if($inscripcion){ header("Location: index.php?action=verAlquiler"); }
        }
        
    }

}

?>