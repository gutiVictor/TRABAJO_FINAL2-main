<?php

session_start();

//
if ($_SESSION["correo"] === null) {
   header("location: ../views/login.php");
}



$conexion = mysqli_connect("localhost", "root", "", "universidad");
$sql = "SELECT * FROM alumnos";

$query = mysqli_query($conexion, $sql);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/agregarAlumnos.css">

    <title>Dashboard</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-container">
            <img src="/assets/logo-university-sin-letters.png" alt="Logo">
            <p>&nbsp;&nbsp;UNIVERSIDAD</p>
        </div>
        <div class="box1">
            <p>admin</p>
            <p>Administrador</p>
        </div>
        <div class="box2">
            <div class="menu-admin">
                <h5>MENÚ ADMINISTRACIÓN</h5>
                <div class="menuIcons"><a href="../views/permisos.php"><img src="/assets/icono-permisos.svg" alt="Permisos">Permisos</a></div>
                <div class="menuIcons"><a href="../views/maestros_table.php"><img src="/assets/icono-maestros.svg" alt="Maestros">Maestros</a></div>
                <div class="menuIcons"><a href="../views/agregarAlumnos.php"><img src="/assets/icono-alumnos.svg" alt="Alumnos">Alumnos</a></div>
                <div class="menuIcons"><a href="../views/agregarClases.php"><img src="/assets/icono-clases.svg" alt="Clases">Clases</a></div>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="menu">
            <ul>
                <li class="menuBar">&#9776;</li>
                <li>HOME</li>
            </ul>
        </div>

        <div class="rol">
            <ul>
                <li>Administrador &nbsp;&nbsp;&#x25BC;
                    <ul class="dropdown">
                        <li><a href="#"><img src="/assets/icono-profile.svg" alt="Profile Img">Profile</a></li>
                        <li><a href="../controller/logout.php"><img src="/assets/icono-logout.svg" alt="Profile Img">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


    <div class="dashboard-title">
        <h1>Lista de Alumnos</h1>
    </div>
    <div class="home-dashboard">
        <a href="#" class="actualPage">Home</a> / Dashboard
    </div>



    <div class="container">
        <div class="content">

            <div class="info">
                <h4>Información de Alumnos</h4>
                <button type="submit" class="btnInfo">Agregar Alumno</button>
                </a>
            </div>


            <div class="linksContainer">
                <ul class="links">
                    <li><a class="linkOpc" href="#">Copy</a></li>
                    <li><a class="linkOpc" href="../modells/alumnosExel.php">Excel</a></li>
                    <li><a class="linkOpc" href="../modells/alumnospdf.php">PDF</a></li>
                    <li><a class="linkOpc" href="#">Column visibility &#x25BC;</a></li>
                </ul>

                <form action="/buscar" method="GET">
                    <label for="busqueda">Search:</label>
                    <input type="text" id="busqueda" data-table="table_id" name="q" placeholder="Escribe aquí...">
                </form>

            </div>

            <table class="clases table_id">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th>Clase</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($fila = mysqli_fetch_array($query)) : ?>

                        <tr>
                            <td><?= $fila['id'] ?></td>
                            <td><?= $fila['nombre'] ?> <?= $fila['apellido'] ?> </td>
                            <td><?= $fila['ciudad'] ?></td>
                            <td><?= $fila['telefono'] ?></td>
                            <td><?= obtenerdato($fila['id_clase'], $conexion) ?></td>

                            <td class="acciones">
                                <a href="../views/modaleditaralumnos.php?id=<?= $fila['id']; ?>" class="btnIcon">
                                    <img src="/assets/icono-editar-datos.svg" alt="Edit Info" class="editIcon">
                                </a>
                                <a href="../controller/borrarAlumnos.php?id=<?= $fila['id'] ?>" class="btnIconDel" onclick="return confirmDeleting()">
                                    <img src="/assets/icono-delete.svg" alt="Delete Info" class="deleteIcon">
                                </a>
                            </td>
                        </tr>

                    <?php endwhile; ?>

                    <?php
                    function obtenerdato($id_clase, $conexion)
                    {
                        $query = mysqli_query($conexion, "SELECT clase FROM clases WHERE id = '$id_clase'");
                        $fila = mysqli_fetch_array($query);
                        return $fila ? $fila['clase'] : 'No asignada';
                    }
                    ?>

                </tbody>
            </table>

            <div class="pagination">
                <button>PREV</button>
                <button>1</button>
                <button>2</button>
                <button>NEXT</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-left">Copyright (C) 2014-2021 <span class="footer-left1" style="color: #337ab7;">AdminLTE.io.</span>
            <span>All rights reserved.</span>
        </div>
        <div class="footer-right">Created by Victor Gutierrez / Funval 2023-2024</div>
    </div>




    <div class="modal-add" id="modal-add">
        <div class="modal_container">

            <form class="modal-form" action="../controller/agrgarAlumnos.php" method="post">

                <div class="header-form">
                    <h2>Agregar Alumno</h2>
                    <a href="#" class="modal_add_close_x">x</a>
                </div>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre del Alumno...">

                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" placeholder="Escribe el apellido del Alumno...">

                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" id="ciudad" placeholder="Escribe la Ciudad...">

                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" placeholder="Escribe el número de teléfono del Alumno...">

                <div class="clase-container">
                    <label for="id_clase">Clase Asignada:</label>
                    <select id="id_clase" name="id_clase" required>
                        <option value="0">Seleccione una clase...</option>
                        <?php
                        $query_clases = mysqli_query($conexion, "SELECT * FROM clases");

                        while ($row_clase = mysqli_fetch_array($query_clases)) {
                            echo "<option value='" . $row_clase['id'] . "'>" . $row_clase['clase'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="botones">
                    <a href="#" class="modal_add_close">Close</a>
                    <input type="submit" class="modal_create" value="Create">
                </div>
            </form>
        </div>

    </div>


    


    <!-- <script src="/scripts/editar.js"></script> -->

    <script>
        const openModals = [...document.querySelectorAll(".btnInfo")];
        const modal = document.getElementById("modal-add");
        const closeModalx = document.querySelector(".modal_add_close_x");
        const closeModal = document.querySelector(".modal_add_close");

        openModals.forEach((openModal) => {
            openModal.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.add("modal--show");
            });
        });

        closeModalx.addEventListener("click", (e) => {
            e.preventDefault();
            modal.classList.remove("modal--show");
        });

        closeModal.addEventListener("click", (e) => {
            e.preventDefault();
            modal.classList.remove("modal--show");
        });

      

        // ------------- For Deleting --

        function confirmDeleting() {
            return confirm("¿Estás realmente seguro de eliminar este Alumno?");
        }
    </script>

<script src="../scrips/buscador.js"></script>

</body>


</html>