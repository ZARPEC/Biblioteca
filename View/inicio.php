<h1>Bienvenido</h1>
<?php

if(!empty($_SESSION['usuario'])){
    echo "
    <h2>
    Mucho gusto: 
        <strong> {$_SESSION['nombres']} {$_SESSION['apellidos']} </strong>
        <p>{$_SESSION['id']}</p>
    </h2>
    ";
}
?>