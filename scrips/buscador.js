// Obtener una referencia al campo de entrada de búsqueda y a la tabla
const searchInput = document.getElementById("busqueda");
const table = document.querySelector(".table_id");

// Agregar un oyente de eventos al campo de entrada de búsqueda
searchInput.addEventListener("keyup", function() {
  const searchTerm = this.value.toLowerCase(); // Obtener el término de búsqueda y convertirlo a minúsculas

  // Filtrar las filas de la tabla
  const rows = table.querySelectorAll("tbody tr");
  rows.forEach(function(row) {
    const cells = row.querySelectorAll("td");
    let matchFound = false;

    // Comprobar cada celda para una coincidencia con el término de búsqueda
    cells.forEach(function(cell) {
      const cellText = cell.textContent.toLowerCase();
      if (cellText.includes(searchTerm)) {
        matchFound = true;
        return; // Salir del bucle cells si se encuentra una coincidencia
      }
    });

    // Mostrar u ocultar la fila según la coincidencia
    row.style.display = matchFound ? "" : "none";
  });
});