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

// ----------------------- For Editing ------------------------------

const openModalEdits = [...document.querySelectorAll(".btnIcon")];
const modalEdit = document.querySelector(".modal-edit");
const closeModalxEdit = document.querySelector(".modal_close_x_edit");
const closeModalEdit = document.querySelector(".modal_close_edit");

openModalEdits.forEach((openModalEdit) => {
  openModalEdit.addEventListener("click", (e) => {
    e.preventDefault();
    modalEdit.classList.add("modal--show");
  });
});

closeModalxEdit.addEventListener("click", (e) => {
  e.preventDefault();
  modalEdit.classList.remove("modal--show");
});

closeModalEdit.addEventListener("click", (e) => {
  e.preventDefault();
  modalEdit.classList.remove("modal--show");
});


function confirmDeleting() {
  return confirm("¿Estás realmente seguro de eliminar este maestro?");
}
