<?php

namespace Model;

use Model\ConexionModel;

class alquilarlibroModel{

    public static function guardarAlquiler($datos2){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO alquiler(fecha,fklibro,fkusuario) VALUES (:date,:idlib,:usuario)");
            $stmt->bindParam(":date", $datos2['fecha'], \PDO::PARAM_STR); // Suponiendo que el nombre del campo en $datos sea 'fecha'
            $stmt->bindParam(":idlib", $datos2['idlib'], \PDO::PARAM_INT); // Suponiendo que el nombre del campo en $datos sea 'idCarro'
            $stmt->bindParam(":usuario", $_SESSION['id'], \PDO::PARAM_INT);
            // Delete o update
            // No ejecución de Código SQL
            return $stmt->execute() ? true : false;
        } catch( \Throwable $th ){
            echo $th;
            print_r($datos2);
            return false;
        }
    }

    public static function mostrarAlquiler(){
        $stmt = ConexionModel::conectar()->prepare("SELECT alquiler.id as idalquiler,titulo,usuario.id AS idUsuario, usuario.nombres as nombres, fecha FROM alquiler INNER JOIN libro on libro.id=fklibro INNER JOIN usuario on usuario.id = fkusuario");//usar un where, para mostrar los cursos que se asignó
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarAlquiler($idAlquiler){
        $stmt = ConexionModel::conectar()->prepare("SELECT titulo, alquiler.id as idalquiler  FROM alquiler INNER JOIN libro on fklibro=libro.id  where alquiler.id = :id");
        $stmt->bindParam(':id',$idAlquiler,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function actualizarAlquiler($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE alquiler SET fklibro = :idlibro where alquiler.id = :id");
        $stmt->bindParam(':idlibro',$datos['idlibro'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idalquiler'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }

    public static function borrarInscripcion($idAlquiler){
        $stmt = ConexionModel::conectar()->prepare("SELECT alquiler.id as idalquiler, titulo FROM alquiler INNER JOIN libro on fklibro = libro.id  where alquiler.id = :id");
        $stmt->bindParam(':id',$idAlquiler,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoAlquiler($id){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM alquiler where alquiler.id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }

}

?>






