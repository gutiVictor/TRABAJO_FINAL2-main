<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logo</title>
    <link rel="stylesheet" href="../style/stiloslogo.css">
</head>

<body>

    <div class="contenedorlogo">
        <div class="logon">
            <img src="../assets/logo-university.png" alt="logo tarea">
        </div>

    </div>

    <div class=" contenedorGlobal">
        <div class="tituloinicial">
            <p>Bienvenido , ingreso a tu cuenta</p>
        </div>


        <form action="../index.php" method="post">

            <div class="imputs">
                <input type="text" placeholder=" Email" name="correo">
            </div>

            <div class="imputs">
                <input type="password" placeholder=" password" name="password">
            </div>
            <div class="botoIngresar">

                <a href="dashboard.php"><button type="submit" name="botoIngresar">Ingresar</button> </a>

            </div>

        </form>

        <div>

        </div>

    </div>

</body>

</html>