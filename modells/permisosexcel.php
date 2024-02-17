<?php


$conexion = mysqli_connect("localhost", "root", "", "universidad");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reportePermisosAmind.xls");
?>


<table class="table table-striped table-dark " id="table_id">


    <thead>

        <h1> Permisos Admin</h1>
       <!--  <img src="logo-university" alt=""> -->

        <tr>
       
                        <th>ID</th>
                        <th>Email / Usuario</th>
                        <th>Permiso</th>
                        <th>Estado</th>
                       

        </tr>
    </thead>
    <tbody>

        <?php

        $conexion = mysqli_connect("localhost", "root", "", "universidad");
        $SQL = "SELECT maestros.id, maestros.email, maestros.id_rol,maestros.estado
         FROM maestros";

        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

        ?>
                <tr>
                    <td> <?= $fila['id'] ?></td>
                    <td><?= $fila['email'] ?></td>
                  
                    <td><?= $fila['estado'] ?></td>
                    <td><?= verRol($fila['id_rol'], $conexion) ?></td>



            <?php
            }
        }
        function verRol($id_rol, $conexion)
                    {
                        $query = mysqli_query($conexion, "SELECT descripcion FROM roles WHERE id = '$id_rol'");
                        $fila = mysqli_fetch_array($query);
                        return $fila ? $fila['descripcion'] : 'No asignada';
                    }
                    ?>


