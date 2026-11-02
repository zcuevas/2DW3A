// Ejercicio 3 - DOM y eventos
let peliculas = [
  { titulo: "Matrix" },
  { titulo: "El Padrino" },
  { titulo: "Inception" }
];
// Esperamos a que el HTML esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
  
// Apartado 1: Al pulsar el botón debes recorrer el array y mostrar cada título como <li>
// Paso 1: CREAR el elemento en memoria
// Seleccionamos los elementos del DOM por su id
const btnMostrar = document.getElementById("btnMostrar");
const listaPeliculas = document.getElementById("listaPeliculas");

// Paso 2: CONFIGURAR el elemento (texto, estilos, eventos de ratón)
// Asociamos el evento de clic al botón
  btnMostrar.addEventListener("click", () => {
    
    // Limpiamos la lista previa para no duplicar elementos si se pulsa varias veces
    listaPeliculas.textContent = "";

    // Recorremos el array de películas
    peliculas.forEach(pelicula => {
      // Creamos el elemento <li> dinámicamente sin usar innerHTML
      const li = document.createElement("li");
      li.textContent = pelicula.titulo; 

      // Apartado 2: Al pasar el ratón por encima, pone el texto en negrita
      // Añadimos los eventos de ratón (hover) para la negrita
      // Evento al pasar el ratón por encima
      li.addEventListener("mouseover", () => {
        li.style.fontWeight = "bold";
      });

      // Evento al sacar el ratón del elemento
      li.addEventListener("mouseout", () => {
        li.style.fontWeight = "normal";
      });

      // Paso 3: INSERTAR el elemento en la pantalla (DOM)
      // Insertamos el <li> dentro de la lista <ul>
      listaPeliculas.appendChild(li);

    });
  });
});
