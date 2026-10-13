const abecedario = [
  'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
  'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
];

let entradaTexto = prompt("Ingrese un texto:");
let entradaNumero = prompt("Ingrese un número:");
const numero = parseInt(entradaNumero, 10); // deveria ser mayusculas

// Declaramos las variables
let textoMayus;
let arrayTexto;

// 1. Validación del número
if (isNaN(numero)) {
  console.log("No introdujiste un número válido.");
} else {
  console.log("Tu número es: " + numero);
}

// 2. Validación del texto
if (entradaTexto !== null && entradaTexto !== "") {
  // Pasamos a mayusculas
  textoMayus = entradaTexto.toUpperCase(); 
  console.log("Resultado en mayúsculas:", textoMayus);
  
  // Hacemos el array de caracteres
  arrayTexto = textoMayus.split("");
  console.log("Array de caracteres:", arrayTexto);

} else {
  console.log("El usuario canceló o dejó el texto vacío.");
}

// 3. Encriptacion
// Para cada elemento del arrayTexto, buscamos su índice en el abecedario
const posiciones = arrayTexto.map(elemento => abecedario.indexOf(elemento));
console.log(posiciones);  // Resultado: [2, -1, 1, -1]

// Sumar a los índices la const numero menos a -1
const sumado = posiciones.map(posicion => posicion !== -1 ? posicion + numero : -1);
console.log(sumado); 

// Pasar índices a letras menos -1
const resultado = sumado.map(indice => {
  if (indice === -1) {
    return -1;

  } else {
    // Usamos el módulo (%) para que si la posición supera 25 (la Z), vuelva a empezar desde la A
    const nuevaPosicion = indice % abecedario.length;
    return abecedario[nuevaPosicion];
  }
});
console.log("Resultado final:", resultado);

// 4. Cambiar los -1 por su valor original
const cifrado = resultado.map((elemento, i) => {
  if (elemento === -1) {
    return arrayTexto[i]; // Coje el valor que está en la misma posición (i) del segundo array
  } else {
    return elemento;  
  }
});
console.log(cifrado); 

// 5. Pasar el array a texto
const texto = cifrado.join("");
console.log(texto);

// 6. ENVIAR LOS RESULTADOS AL HTML 
document.getElementById("texto").textContent = entradaTexto;
document.getElementById("cifrado").textContent = texto;


