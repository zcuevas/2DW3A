const entrada = "   aNe LoPeZ   ";

// 1. Eliminar espacios sobrantes y convertir a minúsculas
const nombreLimpio = entrada.trim().toLowerCase();

// 2. Comprobar si contiene 'lopez'
const contieneLopez = nombreLimpio.includes("lopez");

// 3. Obtener la longitud del texto limpio
const longitud = nombreLimpio.length;

// Resultados
console.log(nombreLimpio);
console.log(`Contiene 'lopez': ${contieneLopez}`);
console.log(`Longitud: ${longitud}`);