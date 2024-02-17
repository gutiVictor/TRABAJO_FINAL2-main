<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
$id_clase = $_POST['id_clase'];

$query_clase_nombre = mysqli_query($conexion, "SELECT clase FROM clases WHERE id = '$id_clase'");
$row_clase_nombre = mysqli_fetch_array($query_clase_nombre);
$nombre_clase = $row_clase_nombre['clase'];

$query = "INSERT INTO alumnos VALUES (0, '$nombre', '$apellido', '$ciudad', '$telefono', '$id_clase')";

if (mysqli_query($conexion, $query)) {
    header("location: ../views/agregarAlumnos.php");
} else {
    echo "Error en el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);