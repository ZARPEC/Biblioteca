<?php

namespace Model;

use Model\ConexionModel;

class AlquilerModel{

    
    public static function mostrarlibro(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM categoria");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function mostrarCat($categoria){
        $stmt=ConexionModel::conectar()->prepare("SELECT * FROM libro WHERE fkcategoria = :cat");
        $stmt->bindParam(":cat", $categoria, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }


}

?>