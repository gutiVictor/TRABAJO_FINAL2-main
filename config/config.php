
<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "universidad";

$conexion=mysqli_connect("localhost","root","","universidad");

if (!$conn) {
  die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}
?>