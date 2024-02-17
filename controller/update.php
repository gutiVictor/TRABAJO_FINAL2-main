<?php

session_start();

if ($_SESSION["correo"] === null) {
    header("location: ../views/login.php");
}

$conexion = mysqli_connect("localhost", "root", "", "universidad");
$sql = "SELECT * FROM maestros";
$query = mysqli_query($conexion, $sql);

$id = intval($_GET['id']);

if (isset($id) && !empty($id)) {
    $sql = "SELECT * FROM maestros WHERE id=?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
    } else {
        // Muestra un mensaje de error indicando que el maestro no existe
        echo "El maestro con el ID $id no existe.";
    }
} else {
    // Muestra un mensaje de error
    echo "Error: No se ha especificado el ID del maestro";
}
?>

<form class="modal-form" action="../controller/update.php" method="post">

<div class="header-form">
    <h2>Editar Maestro</h2>

    <a href="#" class="modal_close_x_edit">x</a>
</div>

<input type="hidden" name="id" value="<?=$fila['id']?>">

<label for="email">Correo Electrónico:</label>
<input type="email" id="email" name="email" placeholder="Email" value="<?=$fila['email']?>">

<label for="name">Nombre:</label>
<input type="text" id="name" name="name" placeholder="Nombre" value="<?=$fila['name']?>">

<label for="lastname">Apellido:</label>
<input type="text" id="lastname" name="lastname" placeholder="Apellido" value="<?=$fila['lastname']?>">

<label for="direccion">Dirección:</label>
<input type="text" id="direccion" name="direccion" placeholder="Direccion" value="<?=$fila['direccion']?>">

<label for="fecha">Fecha:</label>
<input type="date" id="fecha" name="fecha" value="<?=$fila['fecha']?>">

<div class="clase-container">
    <label for="id_clase">Clase Asignada:</label>
    <select id="id_clase" name="id_clase" >
        <option value="0">Seleccione una clase...</option>
        <option value="1">Inglés</option>
        <option value="2">Español</option>
        <option value="3">Física</option>
        <option value="4">Química</option>
        <option value="5">Geografía</option>
    </select>
</div>

<div class="botones">
    <a href="#" class="modal_close_edit">Close</a>
    <a href="#" class="modal_guardar">Guardar Cambios</a>
</div>
</form>
</div>
