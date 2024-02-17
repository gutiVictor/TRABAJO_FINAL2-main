<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");

$nombre = $_POST['clase'];



$query_clase_nombre = mysqli_query($conexion, "SELECT clase FROM clases WHERE id = '$id_clase'");
$row_clase_nombre = mysqli_fetch_array($query_clase_nombre);
$nombre_clase = $row_clase_nombre['clase'];

$query = "INSERT INTO clases VALUES ('', '$nombre')";

if (mysqli_query($conexion, $query)) {
    header("location: ../views/agregarClases.php");
} else {
    echo "Error en el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);