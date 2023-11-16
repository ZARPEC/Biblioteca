<?php
namespace Model;

class agregarLibroModel{

    public static function AgregarLibro($datos){

        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO libro(titulo,fkcategoria) VALUES (:titulo,:cat)");
            $stmt->bindParam(":titulo", $datos['titulo'], \PDO::PARAM_STR); // Suponiendo que el nombre del campo en $datos sea 'fecha'
            $stmt->bindParam(":cat", $datos['categoria'], \PDO::PARAM_INT); // Suponiendo que el nombre del campo en $datos sea 'idCarro'
            return $stmt->execute() ? true : false;
        } catch( \Throwable $th ){
            echo $th;
            print_r($datos);
            return false;
        }
    }
}



?>