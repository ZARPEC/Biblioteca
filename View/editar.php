<?php

use Controller\AlqCarroController;
use Controller\AlquilerController;

$guardar = new AlqCarroController();
$alquiler = $guardar->editar();
$mostrar = new AlquilerController;

if (!empty($_SESSION['id'])) {
?>
    <form method="POST">


        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre</label></div>
                <h3> <?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h3>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Libro Alquilado anterior</label></div>
                <div class="col-5"><input type="text" class="form-control" name="curso" value="<?php echo $alquiler['titulo'] ?>" readonly></input></div>
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="row mb-3">
                <div class="col-2"><label>Categoria</label></div>
                <div class="col-5">
                    <select name="idcategoria" class="form-select">
                        <?php
                        foreach ($mostrar->mostrar() as $row => $item) {
                            echo "<option value='{$item['id']}'>{$item['categoria']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <div class="row">
                <button type="submit " class="btn btn-outline-success btn-sm">Enviar</button>
            </div>
        </div>
    </form>
<?php
    $guardar->actualizar();
    echo "
    <form method='POST'>

    <div class='form-group mt-3'>
    <div class='row'>
        <div class='col-2'><label>carro</label></div>
        <div class='col-5'>
        <select class='form-select' name='idlibro'>
    ";

    foreach ($mostrar->mostarlibros() as $row => $item) {
        echo "<option value='{$item['id']}'>{$item['titulo']}</option>";
    }
    echo "
            </select>
        </div>
    </div>
</div>
<input type='hidden' name='idalquiler' value='{$alquiler['idalquiler']}'>
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