<?php
namespace Model;

class EnlacesModel{
    public static function enlacesPagina($enlace){
        $modulo = match($enlace){
            "inicio"=>"View/inicio.php",
            "nosotros"=>"View/nosotros.php",
            "contacto"=>"View/contacto.php",
            "alquilar"=>"View/alquiler.php",
            "verAlquiler"=>"View/mostrarAlquilados.php",
            "editarAlquiler"=>"View/editar.php",
            "eliminarAlquiler"=>"View/eliminarAlquiler.php",
            "agregarLibro"=>"View/AgregarLibro.php",
            "login"=>"View/login.php",
            "logout"=>"View/logout.php",
            "crearCuenta"=>"View/nuevoUsuario.php",

            default=>"View/error.php"
        };
        return $modulo;

    }
}

?>