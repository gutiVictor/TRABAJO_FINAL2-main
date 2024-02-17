<?php

$conexion = mysqli_connect("localhost", "root", "", "universidad");

if (isset($_GET['id'])) {
    $id_clase = $_GET['id'];

    $query_verificacion = "SELECT COUNT(*) AS total_alumnos FROM alumnos WHERE id_clase = '$id_clase'";
    $result_verificacion = mysqli_query($conexion, $query_verificacion);
    $row_verificacion = mysqli_fetch_assoc($result_verificacion);

    if ($row_verificacion['total_alumnos'] > 0) {

        echo '<script>alert("No es Posible eliminar esta clase ya que tiene alumnos registrados"); window.location.href="../views/agregarClases.php";</script>';
    } else {
        $query_clase = "DELETE FROM clases WHERE id = '$id_clase'";
        if (mysqli_query($conexion, $query_clase)) {
            header("location: ../views/agregarClases.php");
        } else {
            echo "Error al eliminar la clase: " . mysqli_error($conexion);
        }
    }
} else {
    echo "ID de clase no especificado";
}

mysqli_close($conexion);