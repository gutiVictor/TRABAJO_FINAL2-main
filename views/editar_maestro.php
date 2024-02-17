<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");


$id = $_GET['id'];
$sql = "SELECT * FROM alumnos WHERE id = $id";

$query = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_array($query);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<div>
                
                <form action="../controller/editaralumno.php" method="post">
                    <h2>Editar Maestro</h2>

                    
                    
                    <input type="hidden" name="id" value="<?=$fila['id']?>" >
            
                    <label for="email">Correo Electrónico:</label>
                    <input type="text" id="email" name="email" placeholder="Ingrese el correo electrónico" value="<?=$fila['email']?>" >
            
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" placeholder="Ingrese el nombre"  value="<?=$fila['name']?>">
            
                    <label for="lastname">Apellido:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Ingrese el apellido" >
            
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Ingrese la dirección" value="<?=$fila['lastname']?>" >
            
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha"  value="<?=$fila['fecha']?>">
            
                    <label for="id_clase">Clase Asignada:</label>
                    <select id="id_clase" name="id_clase" >
                        <option value="1">Clase 1</option>
                        <option value="2">Clase 2</option>
                       
                    </select>
            
                    <input type="submit" value="Guardar Cambios">
                </form>
            
            
                        </div>
    
</body>
</html>