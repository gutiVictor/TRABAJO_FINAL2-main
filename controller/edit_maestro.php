<?php

$conexion=mysqli_connect("localhost","root","","universidad");

$id=$_POST["id"];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql="UPDATE maestros SET name='$name', lastname='$lastname', username='$username', email='$email' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>