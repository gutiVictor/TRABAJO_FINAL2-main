<section class="modal" id="agregar>
        <div class="modal_container">

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

                <label for="fecha">Fecha:</label>
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