<?php

$conexion = mysqli_connect("localhost", "root", "", "universidad");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM maestros WHERE id='$id'";
    $query = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_array($query);
}




?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar usuarios</title>

</head>

<body>
    <div class="users-form">
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?= $fila['id'] ?>">
            <input type="text" name="name" placeholder="Nombre" value="<?= $fila['name'] ?>">
            <input type="text" name="lastname" placeholder="Apellidos" value="<?= $fila['lastname'] ?>">
            <input type="text" name="direccion" placeholder="direccion" value="<?= $fila['direccion'] ?>">
            <input type="text" name="fecha" placeholder="fecha" value="<?= $fila['fecha'] ?>">
            <input type="text" name="email" placeholder="Email" value="<?= $fila['email'] ?>">

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>

</html>