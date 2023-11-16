<?php

namespace Controller;

use Model\AlquilerModel;

class AlquilerController
{

    public function mostrar()
    {
        $libro = AlquilerModel::mostrarlibro();
        return $libro; //se van a la vista
    }

    public function mostarLibros()
    {
        if (!empty($_POST['idcategoria'])) {
            $libro = AlquilerModel::mostrarCat($_POST['idcategoria']);
            return $libro;
        }
    }
}
