<?php

use Controller\AlqCarroController;
use Controller\AlquilerController;

$guardar = new AlqCarroController();
$alquiler = new AlquilerController();
//$inscripcion = new InscripcionController();

if (!empty($_SESSION['id'])) {
?>
    <h1 class="text-center">Página de alquiler</h1>
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
    $guardar->Alquilar();
    echo "
    <form method='POST'>

    <div class='form-group mt-3'>
    <div class='row'>
        <div class='col-2'><label>Libro</label></div>
        <div class='col-5'>
        <select class='form-select' name='idlibro'>
    ";

    foreach ($alquiler->mostarLibros() as $row => $item) {
        echo "<option value='{$item['id']}'>{$item['titulo']}</option>";
    }
    echo "
            </select>
        </div>
    </div>
</div>
<div class='form-group'>
<div class='row mt-3'>
    <button type='submit' class='btn btn-outline-success btn-sm'>Alquilar</button>
</div>
</div>

    </form>

    ";
}
    ?>
    </div>