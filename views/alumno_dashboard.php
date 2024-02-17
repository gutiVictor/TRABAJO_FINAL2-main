<?php 
 session_start();

 //
 if ($_SESSION["correo"] === null) {
    header("location: ../views/login.php");
} 

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/maestro_dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="sidebar">
        <img src="../assets/logo dashboar.png" alt="Logo">
        <div class="box1">
            <p>Alumno</p>
            <p>alumnos alumnos</p>
        </div>
        <div class="box2">
            <div class="menu-admin">
                <h5>MENÚ ALUMNOS</h5>
                <div class="menuIcons"><a href="#"><img src="/assets/icono-permisos.svg" alt="Permisos">Materias</a></div>
            
                
                <div>Alumnos</div>
                
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
                <li>alumnos alumnos &nbsp;&nbsp;&#x25BC;
                    <ul class="dropdown">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="../controller/logout.php">logout</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="dashboard-title">
        <h1>Dashboard</h1>
        <a href="#" class="actualPage">Home</a> / Dashboard
    </div>


    <div class="container">
        <div class="content">

            <div class="dashboard-subtitle">Bienvenido</div>
            <div class="dashboard-text">Selecciona la acción que quieres realizar en las pestañas del menú de la izquierda.</div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-left">Copyright (C) 2014-2021 <span class="footer-left1" style="color: #337ab7;">AdminLTE.io.</span>
            <span>All rights reserved.</span>
        </div>
        <div class="footer-right">Created by Victor Gutierrez / 2023-2024  Funval</div>
    </div>


</body>


</html>