<?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    
    $id_rol = $_POST['id_rol'];
    $id_clase = $_POST['id_clase'];

    $check_query = "SELECT id FROM maestros WHERE id=?";
    $check_stmt = mysqli_prepare($conexion, $check_query);
    mysqli_stmt_bind_param($check_stmt, "i", $id);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) == 0) {
        header("Location: ../views/permisos.php?error=ID no válido");
        exit();
    }

    $query = "UPDATE maestros SET 
              email = ?, id_rol = ?, id_clase = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . mysqli_error($conexion));
    }

    mysqli_stmt_bind_param($stmt, "sssssii",$id_rol, $id_clase, $id);

    if (mysqli_stmt_execute($stmt)) {

        header("Location: ../views/permisos.php?success=Actualización exitosa");
        exit();
    } else {
        die("Error en la ejecución de la consulta: " . mysqli_error($conexion));
    }


    mysqli_stmt_close($stmt);
}

mysqli_close($conexion);