
// Ejercicio 1 - Arrays y sintaxis básica

let peliculas = [
  { titulo: "Dune: Parte Dos", director: "Denis Villeneuve", anio: 2025, categoria: "Ciencia Ficción", valoracion: 8.5 },
  { titulo: "Inside Out 2", director: "Kelsey Mann", anio: 2023, categoria: "Animación", valoracion: 7.8 },
  { titulo: "Mufasa: The Lion King", director: "Barry Jenkins", anio: 2024, categoria: "Aventura", valoracion: 8.0 }
];

// FUNCIONES
// - mayúsculas()
/*
function mayusculas(lista) {
  return lista.map(function(pelicula) {
    return pelicula.titulo.toUpperCase();
  });
}

let resultado = mayusculas(peliculas);
console.log(resultado);
*/

function mayusculas(lista) {
  lista.forEach(function(pelicula) {
    console.log(pelicula.titulo.toUpperCase());
  });
}
mayusculas(peliculas);

// - peliculasPorCategoria(categoria)
/* 
function peliculasPorCategoria(categoria) {
  return peliculas.filter(function(pelicula) {
    return pelicula.categoria.toLowerCase() === categoria.toLowerCase();
  });
}
*/

function peliculasPorCategoria(categoriaBuscada) {
  let resultado = [];

  for (const peli of peliculas) {
    // peli.categoria        --> La categoría del objeto en la lista
    // categoriaBuscada      --> Lo que el usuario escribió al llamar a la función
    if (peli.categoria.toLowerCase() === categoriaBuscada.toLowerCase()) {
      resultado.push(peli);
    }
  }

  return resultado;
}

let animacion = peliculasPorCategoria("Animación");
console.log(animacion);

// - buscarPorTitulo(titulo)
/*
function buscarPorTitulo(textoBuscado) {
  return peliculas.filter(function(peli) {
    // 1. Convertimos ambos a minúsculas para ignorar mayúsculas/minúsculas
    let tituloEnMinusculas = peli.titulo.toLowerCase();
    let busquedaEnMinusculas = textoBuscado.toLowerCase();

    // 2. Comprobamos si el título contiene el fragmento buscado
    return tituloEnMinusculas.includes(busquedaEnMinusculas);
  });
}
*/
function buscarPorTitulo(textoBuscado) {
  let coincidencias = [];

  for (const peli of peliculas) {
    if (peli.titulo.toLowerCase().includes(textoBuscado.toLowerCase())) {
      coincidencias.push(peli);
    }
  }

  return coincidencias;
}
let tit = buscarPorTitulo("lIoN");
console.log(tit);

// - mediaValoraciones()
/*
function mediaValoraciones() {
  let sumaTotal = peliculas.reduce(function(acumulador, peli) {
    return acumulador + peli.valoracion;
  }, 0);

  return sumaTotal / peliculas.length;
}
*/

function mediaValoraciones(valor){
  let total = 0;

  valor.forEach(function(pelicula){
    return total += pelicula.valoracion;
  });

  let media = total/peliculas.length;
  return media.toFixed(2); 
}

let resultadoMedia = mediaValoraciones(peliculas);
console.log(resultadoMedia); 
