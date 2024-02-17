<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");

$clase = $_POST['clase'];

$query = "INSERT INTO clases VALUES ('', '$clase')";

if (mysqli_query($conexion, $query)) {
    header("location: /views/modal-classes.php");
} else {
    echo "Error en el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);