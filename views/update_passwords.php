<?php

$conexion = mysqli_connect("localhost", "root", "", "universidad");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $consulta);

while ($fila = mysqli_fetch_array($resultado)) {
    $password = $fila['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $consultaActualizar = "UPDATE usuarios SET password = '$hashedPassword' WHERE id = " . $fila['id'];
    mysqli_query($conexion, $consultaActualizar);
}

mysqli_free_result($resultado);
mysqli_close($conexion);

/* echo "Contraseñas actualizadas con éxito!"; */

?>