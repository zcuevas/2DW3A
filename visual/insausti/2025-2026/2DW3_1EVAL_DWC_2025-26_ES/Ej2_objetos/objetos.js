// Ejercicio 2 - OBJETOS Y CLASES
// Clase Pelicula
class Pelicula{
// Constructor con: titulo, director, anio, categoria, valoracion
constructor(titulo, director, anio, categoria, valoracion){
    this.titulo = titulo;
    this.director = director;
    this.anio = anio;
    this.categoria = categoria;
    this.valoracion = valoracion;
}

// Método mostrar() -> "Matrix (1999), dirigida por Wachowski, categoría: Ciencia Ficción"
mostrar(){
  return `${this.titulo} (${this.anio}), dirigida por ${this.director}, categoría: ${this.categoria}`
} 

}
// Crear al menos 2 objetos y meterlos en un array
const peliMatrix = new Pelicula(
    "Matrix",
    "Wachowski",
    1999,
    "Ciencia Ficción",
    8.7
);

const peliInsideOut = new Pelicula(
  "Inside Out 2",
  "Kelsey Mann",
  2023,
  "Animación",
  7.8
);
// Recorrer y mostrar en consola
const misPeliculas = [peliMatrix, peliInsideOut];

misPeliculas.forEach(peli => console.log(peli.mostrar())); 

/*
// Declaramos la función de forma tradicional con su nombre
function imprimirDetallesPelicula(peli) {
  console.log(peli.mostrar());
}

// Pasamos la función como argumento a .forEach (sin los paréntesis al final)
misPeliculas.forEach(imprimirDetallesPelicula);
*/