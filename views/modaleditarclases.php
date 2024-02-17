<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "universidad";

$conexion = mysqli_connect("localhost", "root", "", "universidad");


$id = $_GET['id'];
$sql = "SELECT * FROM clases WHERE id = $id";

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


        <form class="modal-form" action="../controller/editarclaes.php" method="post" style="border: 2px solid #ccc; padding: 14px 30px 60px 30px;">

            <div class="header-form" style="text-align: right;">

                <a href="../views/maestros_table.php" style="display: inline-block; padding: 4px 10px; border-radius: 50%; background-color: red; color: #fff; text-decoration: none; margin-top: 20px;">x</a>

                <h2 style="display: flex;">Editar Maestro</h2>
            </div>

            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <label for="email" style="display: block; margin-bottom: 18px; padding-left: 20px; font-weight: bold;">Email:
                <input type="text" name="email" id="email" placeholder="email" value="<?= $row['email'] ?>" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </label>

            <label for="name" style="display: block; margin-bottom: 18px; padding-left: 20px; font-weight: bold;">Nombre:
                <input type="text" name="name" id="name" placeholder="nombre" value="<?= $row['name'] ?>" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </label>

            <label for="lastname" style="display: block; padding-left: 20px; margin-bottom: 18px; font-weight: bold;">Apellido:
                <input type="text" name="lastname" id="ciudad" placeholder="lastname" value="<?= $row['lastname'] ?>" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </label>

            <label for="direccion" style="display: block; margin-bottom: 18px; padding-left: 20px; font-weight: bold;">Direccion:
                <input type="text" name="direccion" id="direccion" placeholder="Direccion" value="<?= $row['direccion'] ?>" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </label>

            <label for="fecha" style="display: block; margin-bottom: 18px; padding-left: 20px; font-weight: bold;">Fecha:
                <input type="date" name="fecha" id="fecha" placeholder="fecha" value="<?= $row['fecha'] ?>" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </label>

            <div class="clase-container">
                <label for="id_clase" style="display: block; margin-bottom: 18px; padding-left: 20px; font-weight: bold;">Clase Asignada:
                    <select id="id_clase" name="id_clase" required style="width: 50%; padding: 8px; box-sizing: border-box;">
                        <option value="0">Seleccione una clase...</option>
                        <?php
                        $query_clases = mysqli_query($conexion, "SELECT * FROM clases");

                        while ($row_clase = mysqli_fetch_array($query_clases)) {
                            echo "<option value='" . $row_clase['id'] . "'>" . $row_clase['clase'] . "</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>

            <div class="botones" style="text-align: right;">
                <a href="../views/maestros_table.php" class="close_x_edit" style="display: inline-block; padding: 6px 12px; background-color: red; color: #fff; text-decoration: none; border-radius: 5px;">Close</a>

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


        function confirmDeleting() {
            return confirm("¿Estás realmente seguro de eliminar esta clase?");
        }
    </script>
</body>

</html>