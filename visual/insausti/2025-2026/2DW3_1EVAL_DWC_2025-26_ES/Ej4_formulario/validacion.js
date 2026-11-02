// Ejercicio 4 - Validación de formulario
document.addEventListener("DOMContentLoaded", () => {

  // Guardamos la referencia al formulario
  const form = document.getElementById("formPelicula");

  // Escuchamos el envío del formulario
  form.addEventListener("submit", (e) => {
    // Evitamos que el navegador recargue la página
    e.preventDefault();

    // Leemos los VALORES actuales de los campos justo en este momento
    const titulo = document.getElementById("titulo").value;
    const director = document.getElementById("director").value;
    const anio = document.getElementById("anio").value;
    const categoria = document.getElementById("categoria").value;

    // Validaciones a implementar:
    // Array para acumular los mensajes de error
    const errores = [];

    // Expresiones regulares
    const regexTexto = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}$/; 
    const regexAnio = /^(19\d{2}|20\d{2})$/;
    
    // - titulo y director: entre 3 y 50 caracteres
    if (!regexTexto.test(titulo)) {
      errores.push("El título debe tener entre 3 y 50 caracteres alfabéticos.");
    }
    if (!regexTexto.test(director)) {
      errores.push("El director debe tener entre 3 y 50 caracteres alfabéticos.");
    }
    // - anio: numérico de 4 dígitos entre 1900 y 2099
    if (!regexAnio.test(anio)) {
      errores.push("El año debe ser un número de 4 dígitos entre 1900 y 2099.");
    }
    // - categoria: no vacía
    if (categoria === "") {
      errores.push("Debes seleccionar una categoría.");
    }

    // MENSAJES DE ERROR Al enviar el formulario, mostrar mensajes de error o éxito en el div#mensaje
    const divMensaje = document.getElementById("mensaje");

    if (errores.length > 0) {
      // Unimos todas las frases guardadas en el array con saltos de línea (<br>)
      divMensaje.innerHTML = errores.join("<br>");
      divMensaje.style.color = "red"; // (Opcional) Para que se vea en rojo
    } else {
      // Si no hay errores en el array, todo ha ido bien
      divMensaje.innerHTML = "Película validada correctamente";
      divMensaje.style.color = "green"; // (Opcional) Para que se vea en verde
    }
    
  });
});