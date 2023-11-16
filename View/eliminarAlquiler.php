<?php

use Controller\AlqCarroController;

$alquiler = new AlqCarroController();

$registro = $alquiler->borrar();



?>

<form method="POST">
    <?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos'];  ?>
    <br>
    <?php echo $registro['titulo'] ?>


    <input type="hidden" name="idAlquiler" value="<?php echo $registro['idalquiler']; ?>">

    <br>
    <button type="submit" class="btn btn-primary">Confirmar</button>

    <?php $alquiler->confirmarBorrar(); ?>
</form>
