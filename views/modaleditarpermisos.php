<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");


$id = $_GET['id'];
$sql = "SELECT * FROM maestros WHERE id = $id";

$query = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="display: flex; justify-content: center; align-items: center;">

    <div class="modal-edit" data-alumno-id="<?= $row['id']; ?>">
        <div class="modal_container-edit" style="width: 100%;">
        </div>


        <form class="modal-form" action="../controller/editarpermisos.php" method="post" style="border: 2px solid #ccc; padding: 14px 30px 60px 30px;">

            <div class="header-form" style="text-align: right;">

                <a href="../views/permisos.php" style="display: inline-block; padding: 4px 10px; border-radius: 50%; background-color: red; color: #fff; text-decoration: none; margin-top: 20px;">x</a>

                <h2 style="display: flex;">Editar Permiso</h2>
            </div>

            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <label for="email" style="display: block; margin-bottom: 18px; padding-left: 20px; font-weight: bold;">Email de Usuario:
                <input type="text" name="email" id="email" placeholder="email" value="<?= $row['email'] ?>" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </label>

            <label for="name" style="display: block; margin-bottom: 18px; padding-left: 20px; font-weight: bold;">Rol del Usuario:
               
                <select id="rol" name="rol" required>
                        <option value="0">Seleccione Rol...</option>
                        <option value="1">Administrador</option>
                        <option value="2">Maestro</option>
                    </select>
            
            </label>
            

           

                <div class="switch-container">
                    <div class="switch-box">
                        <input type="checkbox" id="estado" name="estado" class="switch" onchange="toggleUserStatus()">
                        <span class="switch-label">Usuario Inactivo</span>
                    </div>
                    <span id="userStatus"> Usuario Inactivo</span>
                </div>

           
           

           

            <div class="botones" style="text-align: right;">
                <a href="../views/permisos.php" class="close_x_edit" style="display: inline-block; padding: 6px 12px; background-color: red; color: #fff; text-decoration: none; border-radius: 5px;">Close</a>

                <input type="submit" name="accion" class="modal_guardar" value="Guardar" style="display: inline-block; padding: 6px 12px; background-color: #00ced1; color: #fff; text-decoration: none; border-radius: 5px;">
            </div>


           
        </form>
    </div>

    <script>
       

        const openModalEdits = [...document.querySelectorAll(".btnIcon")];
        const modalEdit = document.querySelector(".modal-edit");
        const closeModalxEdit = document.querySelector(".modal_close_x_edit_alumn");
        const closeModalEdit = document.querySelector(".modal_close_edit_alumn");



        openModalEdits.forEach((openModalEdit) => {
            openModalEdit.addEventListener("click", (e) => {
                e.preventDefault();
                modalEdit.classList.add("modal-edit--show");
            });
        });
    </script>
</body>

</html>