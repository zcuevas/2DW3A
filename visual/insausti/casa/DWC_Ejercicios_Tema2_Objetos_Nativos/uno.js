// Elimine los espacios al principio y al final. ✓
// Convierta el texto a minúsculas. ✓
// Compruebe si contiene la cadena "lopez". ✓
// Muestre la longitud del texto una vez limpio.
// Genere un identificador sustituyendo el espacio entre nombre y apellido por un punto. Ejemplo: ane.lopez.

let nombre = prompt("Introduce su nombre y apellido:")
console.log(nombre);

nombre = nombre.trim();
console.log(nombre);

nombre = nombre.toLowerCase();
console.log(nombre);

console.log(nombre.includes("lopez"));

console.log(nombre.length);

nombre = nombre.replace(" ", ".");



/*
const entrada = "   aNe LoPeZ   ";

// 1. Eliminar espacios al principio y al final (.trim())
let textoLimpio = entrada.trim();

// 2. Convertir el texto a minúsculas (.toLowerCase())
textoLimpio = textoLimpio.toLowerCase();

// 3. Comprobar si contiene "lopez" (.includes())
let contieneLopez = textoLimpio.includes("lopez");

// 4. Obtener la longitud del texto una vez limpio (.length)
let longitud = textoLimpio.length;

// 5. Generar identificador sustituyendo el espacio por un punto (.replaceAll() o .replace())
let identificador = textoLimpio.replace(" ", ".");


// MOSTRAR RESULTADOS EN CONSOLA
console.log("Texto limpio:", textoLimpio);
console.log("¿Contiene 'lopez'?:", contieneLopez);
console.log("Longitud del texto limpio:", longitud);
console.log("Identificador generado:", identificador);
*/