let salsa = "R oS a "
// Opción con replaceAll
const sinEspacios = salsa.replaceAll(" ", "").toLowerCase();
console.log(sinEspacios); // "rosa"


const juego = [" hola", "TR es", " c a S a "];
console.log(juego);

juego[3] = "cinco";
console.log(juego);

// Nuevo elemento al principio
juego.unshift("ceRRA dura");
console.log(juego);

// Nuevo elemento al final
juego.push("seis");
console.log(juego); 

// Para formatear cada texto dentro del array usamos .map():
const juegoLimpio = juego.map(texto => texto.trim().toLowerCase());
console.log(juegoLimpio);
// Imprime: ["hola", "tr es", "c a s a", "cinco", "seis"]

const juegoFino = juegoLimpio.map(texto => texto.replaceAll(" ", ""));
console.log(juegoFino);
// Imprime: ['hola', 'tres', 'casa', 'cinco', 'seis']

// Borra el ultimo elemnto
juegoFino.pop();
console.log(juegoFino);

// Borra el primer elemnto
juegoFino.shift();
console.log(juegoFino);

