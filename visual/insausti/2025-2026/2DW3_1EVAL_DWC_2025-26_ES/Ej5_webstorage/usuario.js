// Ejercicio 5 - Web Storage
document.addEventListener("DOMContentLoaded", () => {
  
  // 1. Intentamos leer si existe un usuario guardado en localStorage
  const contenedor = document.getElementById("contenedor");
  const usuarioGuardado = localStorage.getItem("nombreUsuario");

  // 2 CASO A: Ya existe un usuario guardado.  Mostrar mensaje: "Bienvenido de nuevo, <usuario>" y botón Cerrar sesión
  if (usuarioGuardado !== null) {
    contenedor.innerHTML = `
      <p>Bienvenido de nuevo, ${usuarioGuardado}</p>
      <button id="btnCerrar">Cerrar sesión</button>
    `;    

    // Seleccionamos el botón dinámico e implementamos el borrado
    const btnCerrar = document.getElementById("btnCerrar");
    btnCerrar.addEventListener("click", () => {
      localStorage.removeItem("nombreUsuario");
      location.reload(); // Recargamos para reiniciar el estado y mostrar el formulario
    });

  // 2 CASO B: No hay ningún usuario guardado, guardar al nuevo usuario
  } else {
    const form = document.getElementById("formUsuario");

    // Escuchamos el envío del formulario para GUARDAR (setItem)
    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const nombre = document.getElementById("nombreUsuario").value;

      // Guardamos si el campo no está vacío
      if (nombre !== "") {
        localStorage.setItem("nombreUsuario", nombre);
        location.reload(); // Recargamos para que ejecute el bloque de bienvenida
      } else {
        alert("Por favor, introduce un nombre de usuario.");
      }

    });
  }
});