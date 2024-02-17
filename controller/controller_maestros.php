<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");

$email = $_POST['email'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$direccion = $_POST['direccion'];
$fecha = $_POST['fecha'];
$id_clase = $_POST['id_clase'];

$query_clase_nombre = mysqli_query($conexion, "SELECT clase FROM clases WHERE id = '$id_clase'");
$row_clase_nombre = mysqli_fetch_array($query_clase_nombre);
$nombre_clase = $row_clase_nombre['clase'];

$query = "INSERT INTO maestros (id, email, name, lastname, direccion, fecha, id_clase)
VALUES (0, '$email', '$name', '$lastname', '$direccion', '$fecha', '$id_clase')";


if (mysqli_query($conexion, $query)) {
    header("location: ../views/maestros_table.php");
} else {
    echo "Error en el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);
