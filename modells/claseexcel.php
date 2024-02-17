<?php


$conexion = mysqli_connect("localhost", "root", "", "universidad");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteAlumnos.xls");
?>


<table class="table table-striped table-dark " id="table_id">


    <thead>

        <h1> Tabla  Alumnos</h1>
      

        <tr>
            <th>ID</th>
            <th>Clase</th>
            <th>Maestro Asignado </th>
            <th>Alumnos Inscritos</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $conexion = mysqli_connect("localhost", "root", "", "universidad");
        $SQL = "SELECT clases.id, clases.clase,maestro.name,  maestro.lastname, alumnos.id_clase
         FROM clases, maestros, alumnos";

        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

        ?>
                <tr>
                    <td> <?= $fila['id'] ?></td>
                    <td><?= verClase($fila['id_clase'], $conexion) ?></td>
                    <td><?= $fila['name'] ?> <?= $fila['lastname'] ?> </td>
                    <td><?= $fila['ciudad'] ?> </td>
                    <td><?= $fila['telefono'] ?></td>
                   



            <?php
            }
        }
        function verClase($id_clase, $conexion)
        {
            $query = mysqli_query($conexion, "SELECT clase FROM clases WHERE id = '$id_clase'");
            $fila = mysqli_fetch_array($query);
            return $fila ? $fila['clase'] : 'No asignada';
        }


