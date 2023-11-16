<?php

use Controller\AlqCarroController;

if (!empty($_SESSION['id']) && !empty($_SESSION['rol']) && $_SESSION['rol']=='a' ) {
    $alquileres = new AlqCarroController;
    $listado = $alquileres->mostrar();

    echo "
    <div class='row justify-content-center align-items-center'>
    <table class='table table-striped table-bordered table-hover mt-5 w-50'>
    <thead class='table-dark'>
        <tr>
            <th scope='col'>ID Alquiler</th>
            <th scope='col'>Titulo</th>
            <th scope='col'>Nombre</th>
            <th class='col'>Fecha</th>
            <th class='col'>Editar</th>
            <th class='col'>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    ";
    foreach ($listado as $row => $item) {
        echo "
            <tr class=' text-center table-secondary'>
                <td class='col'>{$item['idalquiler']}</td>
                <td class='col'>{$item['titulo']}</td>
                <td class='col'>{$item['nombres']}</td>
                <td class='col'>{$item['fecha']}</td>
                <td class='col'><a href='index.php?action=editarAlquiler&idAlquiler={$item['idalquiler']}'>editar</a></td>
                <td class='col'><a  href='index.php?action=eliminarAlquiler&idAlquiler={$item['idalquiler']}' >Eliminar</a></td>
            </tr>
        ";
    }
    echo " 
    </tbody>
    </table>
    </div>
    ";
}elseif (!empty($_SESSION['id'])){
    $alquileres = new AlqCarroController;
    $listado = $alquileres->mostrar();

    echo "
    <div class='row justify-content-center align-items-center'>
    <table class='table table-striped table-bordered table-hover mt-5 w-50'>
    <thead class='table-dark'>
        <tr>
            <th scope='col'>ID Alquiler</th>
            <th scope='col'>Titulo</th>
            <th scope='col'>Nombre</th>
            <th class='col'>Fecha</th>
            <th class='col'>Editar</th>
            <th class='col'>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    ";
    foreach ($listado as $row => $item) {
        if($item['idUsuario']==$_SESSION['id'])
        echo "
            <tr class=' text-center table-secondary'>
                <td class='col'>{$item['idalquiler']}</td>
                <td class='col'>{$item['titulo']}</td>
                <td class='col'>{$item['nombres']}</td>
                <td class='col'>{$item['fecha']}</td>
                <td class='col'><a href='index.php?action=editarAlquiler&idAlquiler={$item['idalquiler']}'>editar</a></td>
                <td class='col'><a  href='index.php?action=eliminarAlquiler&idAlquiler={$item['idalquiler']}' >Eliminar</a></td>
            </tr>
        ";
    }
    echo " 
    </tbody>
    </table>
    </div>
    ";
}