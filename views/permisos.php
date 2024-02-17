

<?php

session_start();

//
 if ($_SESSION["correo"] === null) {
   header("location: ../views/login.php");
}
 
$conexion = mysqli_connect("localhost", "root", "", "universidad");
$sql = "SELECT * FROM maestros";

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
    <link rel="stylesheet" href="../style/permisos.css">


    <title>Dashboard Permisos</title>
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
                <div class="menuIcons"><a href="/views/maestros_table.php"><img src="/assets/icono-maestros.svg" alt="Maestros">Maestros</a></div>
                <div class="menuIcons"><a href="#"><img src="/assets/icono-alumnos.svg" alt="Alumnos">Alumnos</a></div>
                <div class="menuIcons"><a href="#"><img src="/assets/icono-clases.svg" alt="Clases">Clases</a></div>
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
                        <li><a href="#"><img src="/assets/icono-profile.svg" alt="Profile Img">Profile </a></li>
                        <li><a href="../controller/logout.php"><img src="/assets/icono-logout.svg" alt="Profile Img">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


    <div class="dashboard-title">
        <h1>Lista de Permisos</h1>
    </div>
    <div class="home-dashboard">
        <a href="#" class="actualPage">Home</a> / Permisos
    </div>



    <div class="container">
        <div class="content">

            <div class="info">
                <h4>Información de Permisos</h4>
            </div>

            <div class="linksContainer">
                <ul class="links">
                    <li><a class="linkOpc" href="#">Copy</a></li>
                    <li><a class="linkOpc" href="../modells/permisosexcel.php">Excel</a></li>
                    <li><a class="linkOpc" href="../modells/permisospdf.php">PDF</a></li>
                    <li><a class="linkOpc" href="#">Column visibility &#x25BC;</a></li>
                </ul>

                <form action="/buscar" method="GET">
                    <label for="busqueda">Search:</label>
                    <input type="text" id="busqueda" data-table="table_id" name="q" placeholder="Escribe aquí...">
                </form>
            </div>

            <table class="permisos table_id">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email / Usuario</th>
                        <th>Permiso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($fila = mysqli_fetch_array($query)): ?>
                    <tr>
                    <td> <?=$fila['id']?></td>
                    <td><?=$fila['email']?></td>
                    <td><?= verRol($fila['id_rol'], $conexion) ?></td>
                        <td><?=$fila['estado']?></td>
                       
                        <td class="acciones"> <a href="../views/modaleditarpermisos.php?id=<?=$fila['id']?>" class="btnIcon" data-maestro-id="<?=$fila['id'];?>" >
                                    <img src="../assets/icono-editar-datos.png" alt="update Info" class="editIcon">
                                </a>
                                    <!-- <a href="../controller/borrarpermiso.php?id=<?=$fila['id']?>" class="btnIconDel" onclick="return confirmDeleting()">
                                    <img src="/assets/icono-delete.svg" alt="Delete Info" class="deleteIcon">
                                </a> -->
                        </td>
                    </tr>
                    
                    <?php endwhile;?>
                    <?php
                    function verRol($id_rol, $conexion)
                    {
                        $query = mysqli_query($conexion, "SELECT descripcion FROM roles WHERE id = '$id_rol'");
                        $fila = mysqli_fetch_array($query);
                        return $fila ? $fila['descripcion'] : 'No asignada';
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
        <div class="footer-right">Created by Victor Gutierrez/  2023-2024 Funval</div>
    </div>


    
    <!--   ventanas modal -->
   <!--  <section class="modal">
        <div class="modal_container">

            <form class="modal-form" action="../controller/controller_maestros.php" method="post">

                <div class="header-form">
                    <h2>Editar Permiso</h2>
                    <a href="#" class="modal_close_x">x</a>
                </div>

                <label for="email">Email de usuario:</label>
                <input type="email" id="email" name="email">

                <div class="rol-container">
                    <label for="rol">Rol de usuario:</label>
                    <select id="rol" name="rol" required>
                        <option value="0">Seleccione Rol...</option>
                        <option value="1">Administrador</option>
                        <option value="2">Maestro</option>
                    </select>
                </div>

                <div class="switch-container">
                    <div class="switch-box">
                        <input type="checkbox" id="estado" name="estado" class="switch" onchange="toggleUserStatus()">
                        <span class="switch-label">Usuario Inactivo</span>
                    </div>
                    <span id="userStatus"> Usuario Inactivo</span>
                </div>

                <div class="botones">
                    <a href="#" class="modal_close">Close</a>
                    <a href="#" class="modal_guardar">Guardar Cambios</a>
                </div>
            </form>
        </div>

    </section> -->


    <script>
        const openModal = document.querySelector(".btnIcon");
        const modal = document.querySelector(".modal");
        const closeModalx = document.querySelector(".modal_close_x");
        const closeModal = document.querySelector(".modal_close");

        openModal.addEventListener("click", (e) => {
            e.preventDefault();
            modal.classList.add("modal--show");
        });

        closeModalx.addEventListener("click", (e) => {
            e.preventDefault();
            modal.classList.remove("modal--show");
        });

        closeModal.addEventListener("click", (e) => {
            e.preventDefault();
            modal.classList.remove("modal--show");
        });

        // --------- Botón cambio de estado ------------

        function toggleUserStatus() {
            const switchElement = document.getElementById("estado");
            const switchLabel = document.querySelector(".switch-label");
            const userStatus = document.getElementById("userStatus");

            if (switchElement.checked) {
                switchLabel.textContent = "Usuario Activo";
                userStatus.textContent = "Usuario Activo";
            } else {
                switchLabel.textContent = "Usuario Inactivo";
                userStatus.textContent = "Usuario Inactivo";
            }
        }
    </script>

</section><script src="../scrips/buscador.js"></script>
</body>


</html>