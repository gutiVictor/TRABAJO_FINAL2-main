<?php


$conexion = mysqli_connect("localhost", "root", "", "universidad");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteAmind.xls");
?>


<table class="table table-striped table-dark " id="table_id">


    <thead>

        <h1> Tabla Admin</h1>
        <img src="logo-university" alt="">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Direccion</th>
            <th>Fec. de Nacimiento</th>
            <th>Clase Asignada</th>

        </tr>
    </thead>
    <tbody>

        <?php

        $conexion = mysqli_connect("localhost", "root", "", "universidad");
        $SQL = "SELECT maestros.id, maestros.name,maestros.lastname,  maestros.email, maestros.direccion, maestros.fecha,maestros.id_clase
         FROM maestros";

        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

        ?>
                <tr>
                    <td> <?= $fila['id'] ?></td>
                    <td><?= $fila['name'] ?> <?= $fila['lastname'] ?> </td>
                    <td><?= $fila['lastname'] ?> </td>
                    <td><?= $fila['email'] ?></td>
                    <td><?= $fila['direccion'] ?></td>
                    <td><?= $fila['fecha'] ?></td>
                    <td><?= verClase($fila['id_clase'], $conexion) ?></td>



            <?php
            }
        }
        function verClase($id_clase, $conexion)
        {
            $query = mysqli_query($conexion, "SELECT clase FROM clases WHERE id = '$id_clase'");
            $fila = mysqli_fetch_array($query);
            return $fila ? $fila['clase'] : 'No asignada';
        }


