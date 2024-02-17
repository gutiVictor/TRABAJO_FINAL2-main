->


<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'editar':
            editar();
            break;

        case 'eliminar':
            eliminar();
            break;
    }
}

function editar()
{

    extract($_POST);
    require_once("config.php");

    $consulta = "UPDATE maestros SET email = '$email', name = '$name', 
    lastname = '$lastname',direccion ='$direccion', fecha = '$fecha'  WHERE id = '$id' ";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo '
        <script type = "text/javascript">
            alert("Datos actualizados exitosamente");
            window.location = "../views/maestros_table.php";
        </script>
    ';
    } else {
        echo '
        <script type = "text/javascript">
            alert("Error");
            window.location = "../views/maestros_table.php";
        </script>
    ';
    }
}

function eliminar()
{

    extract($_POST);
    require_once("db.php");

    $consulta = "DELETE FROM documento WHERE id = '$id' ";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo '
        <script type = "text/javascript">
            alert("Registro Eliminado");
            window.location = "../views/maestros_table.php";
        </script>
    ';
    } else {
        echo '
        <script type = "text/javascript">
            alert("Error");
            window.location = "../views/maestros_table.php";
        </script>
    ';
    }
}
