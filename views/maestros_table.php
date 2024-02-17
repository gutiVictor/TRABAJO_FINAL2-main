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
    <link rel="stylesheet" href="../style/styledashboardAdmin.css">
    <link rel="stylesheet" href="/style/maestros_table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  
   

    <title>Dashboard</title>

    
</head>

<body>
    <div class="sidebar">
        <div class="logo-container">
            <img src="/assets/logo-university-sin-letters.png" alt="Logo">
            <p>&nbsp;&nbsp;UNIVERSIDAD</p>
        </div>
        <div class="box1">
            <p>ADMIN</p>
            <p> Bienvenido </p>
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
                        <li><a href="#"><img src="/assets/icono-profile.svg" alt="Profile Img">Profile </a></li>
                        <li><a href="../controller/logout.php"><img src="/assets/icono-logout.svg" alt="Profile Img">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


    <div class="dashboard-title">
        <h1>Listas de maestros</h1>
    </div>
    <div class="home-dashboard">
        <a href="#" class="actualPage">Home</a> / Dashboard

    </div>
    <div class="container">
        <div class="content">

            <div class="info">
                <h4>Información de Maestros</h4>
                <button type="submit" class="btnInfo">Agregar Maestro</button>
            </div>

            <div class="linksContainer">
                <ul class="links">
                    <li><a class="linkOpc" href="#">Copy</a></li>
                    <li><a class="linkOpc" href="../modells/excel.php">Excel</a></li>
                    <li><a class="linkOpc" href="../modells/pdf.php">PDF</a></li>
                    <li><a class="linkOpc" href="#">Column visibility &#x25BC;</a></li>
                </ul>

                <form action="/buscar" method="GET">
                    <label for="busqueda">Search:</label>
                    <input type="text" id="busqueda" data-table="table_id" name="q" placeholder="Escribe aquí...">
                </form>
            </div>


            <table class="maestros table_id" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Fec. de Nacimiento</th>
                        <th>Clase Asignada</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    <?php while ($fila = mysqli_fetch_array($query)): ?>

                        <tr>
                            <td> <?=$fila['id']?></td>
                            <td><?=$fila['name']?> <?=$fila['lastname']?> </td>
                            <td><?=$fila['email']?></td>
                            <td><?=$fila['direccion']?></td>
                            <td><?=$fila['fecha']?></td>
                            <td><?= verClase($fila['id_clase'], $conexion) ?></td>
                           
                            <td class="acciones"> <a href="../views/modaleditarmaestro.php?id=<?=$fila['id']?>" class="btnIcon" data-maestro-id="<?=$fila['id'];?>" >
                                    <img src="../assets/icono-editar-datos.png" alt="update Info" class="editIcon">
                                </a>
                                    <a href="../controller/borrarMaestro.php?id=<?=$fila['id']?>" class="btnIconDel" onclick="return confirmDeleting()">
                                    <img src="/assets/icono-delete.svg" alt="Delete Info" class="deleteIcon">
                                </a>


                            </td>

                        </tr>
                   

                    <?php endwhile;?>
                    <?php
                    function verClase($id_clase, $conexion)
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
        <div class="footer-right">Created by Victor Gutierrez / 2023-2024 Funval </div>
    </div>

    <!--   ventanas modal -->

    <section class="modal">
        <div class="modal_container" >

            <form class="modal-form" action="../controller/controller_maestros.php" method="post">

                <div class="header-form">
                    <h2>Agregar Maestro</h2>
                    <a href="#" class="modal_close_x">x</a>
                </div>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder=" Ingrese el correo electrónico" required>

                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Ingrese el nombre" required>

                <label for="lastname">Apellido:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Ingrese el apellido" required>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" placeholder="Ingrese la dirección" required>

                <label for="fecha">Fecha de Nacimiento:</label>
                <input type="date" id="fecha" name="fecha" required>

                <div class="clase-container">
                    <label for="id_clase">Clase Asignada:</label>
                    <select id="id_clase" name="id_clase" required>
                        <option value="0">Seleccione una clase...</option>
                        <option value="1">Inglés</option>
                        <option value="2">Español</option>
                        <option value="3">Física</option>
                        <option value="4">Química</option>
                        <option value="5">Geografía</option>
                    </select>
                </div>
                <div class="botones">
                    <a href="#" class="modal_close">Close</a>
                    <input type="submit" value="Create"class="modal_create">
                </div>
            </form>
        </div>

    </section>



            </form>
        </div>

    </section><script src="../scrips/buscador.js"></script>
  
    
<script>

const openModals = [...document.querySelectorAll(".btnInfo")];
const modal = document.querySelector(".modal");
const closeModalx = document.querySelector(".modal_close_x");
const closeModal = document.querySelector(".modal_close");

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


function confirmDeleting() {
            return confirm("¿Estás realmente seguro de eliminar este Maestro?");
        }
</script>
  



</body>


</html>