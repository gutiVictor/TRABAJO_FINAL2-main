<?php
$conexion = mysqli_connect("localhost", "root", "", "universidad");


$id=$_POST["id"];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$direccion = $_POST['direccion'];
$fecha = $_POST['fecha'];
$email = $_POST['email'];

$sql="UPDATE maestros SET name='$name', lastname='$lastname', direccion='$direccion', fecha='$fecha', email='$email' WHERE id='$id'";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: ../index.php");
}else{

}

?>