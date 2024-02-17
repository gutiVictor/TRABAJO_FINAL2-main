<?php


$conexion=mysqli_connect("localhost","root","","universidad");

if (isset($_GET['id'])) {
    $id_maestro = $_GET['id'];

    $query = "DELETE FROM maestros WHERE id = '$id_maestro'";
    if (mysqli_query($conexion, $query)) {
        header("location: ../views/permisos.php ");
    } else {
        echo "Error al eliminar maestro: " . mysqli_error($conexion);
    }
} else {
    echo "ID de maestro no encontrado";
}

mysqli_close($conexion);