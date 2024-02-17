<?php
$conexion = mysqli_connect("localhost", "root", "", "universidad");

if (isset($_GET['id'])) {
    $id_alumno = $_GET['id'];

    $query = "DELETE FROM alumnos WHERE id = '$id_alumno'";
    if (mysqli_query($conexion, $query)) {
        header("location: ../views/agregarAlumnos.php");
    } else {
        echo "Error al eliminar al alumno: " . mysqli_error($conexion);
    }
} else {
    echo "ID de alumno no especificado";
}

mysqli_close($conexion);