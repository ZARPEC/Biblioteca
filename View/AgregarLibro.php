<?php

use Controller\agregarLibroController;
use Controller\AlquilerController;

$agregar = new agregarLibroController();
$alquiler = new AlquilerController();
//$inscripcion = new InscripcionController();

if (!empty($_SESSION['id'])) {
?>
    <h1 class="text-center">Agregar Libros</h1>
    <div class="container w-50">
        <form method="POST">

            <div class="alert alert-light" role="alert">
                <h1 class="text-center">
                    <?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos'];
                    ?>
                </h1>
            </div>
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label for="titulo">Titulo</label></div>
                    <div class="col-10"><input type="text" name="titulo" id="titulo"   class="form-control" required></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>Categoria</label></div>
                    <div class="col-5">
                        <select name="idcategoria" class="form-select">
                            <?php
                            foreach ($alquiler->mostrar() as $row => $item) {
                                echo "<option value='{$item['id']}'>{$item['categoria']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-outline-success btn-sm">Enviar</button>
                </div>
            </div>
        </form>
    <?php
    $agregar->agregar();

    if($agregar=="error"){

        echo "<div class='alert alert-danger mt-5' role='alert'>
        Error en los datos
        </div>";
    }else if($agregar=="guardado"){
        echo "<div class='alert alert-dismissible alert-success mt-5' role='alert'>
        Usuario creado correctamente
        </div>";
        
    }

}
    ?>