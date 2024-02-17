<?php
/* conexion */
$correo = $_POST['correo'];
$password = $_POST['password'];
session_start();

$_SESSION['correo'] = $correo;

$conexion = mysqli_connect("localhost", "root", "", "universidad");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
/* consulta */
$consulta = "SELECT * FROM usuarios WHERE correo='$correo' LIMIT 1";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) === 1) {
    $filas = mysqli_fetch_array($resultado);

    if (password_verify($password, $filas['password'])) { // Verifica el hash
        if ($filas['rol_id'] == 1) { // administrador
            header("location:../views/dashboardAdmin.php");
        } else if ($filas['rol_id'] == 2) { // maestro
            header("location:../views/maestro_dashboard.php");
        } else if ($filas['rol_id'] == 3) { // alumno
            header("location:./views/alumno_dashboard.php");
        }
    } else {
        header('location:../views/login.php'); // Contraseña incorrecta
    }
} else {
    header('location:../views/login.php'); // Usuario no encontrado
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>