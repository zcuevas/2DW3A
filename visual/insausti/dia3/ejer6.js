const datos = " Ane, jon, MIKEL, ane, Jon, irati,  mikel ";

// 1. Separar por comas, limpiar espacios y normalizar capitalización (Primera letra mayúscula, resto minúscula)
const participantesLimpios = datos
  .split(",")
  .map(nombre => {
    const limpio = nombre.trim().toLowerCase();
    return limpio.charAt(0).toUpperCase() + limpio.slice(1);
  });

// 2. Eliminar duplicados usando Set
const participantesUnicos = Array.from(new Set(participantesLimpios));

// 3. Mostrar total de participantes
console.log(`Lista de participantes: ${participantesUnicos.join(", ")}`);
console.log(`Total de participantes únicos: ${participantesUnicos.length}`);

// 4. Elegir aleatoriamente a un ganador con Math
const indiceAleatorio = Math.floor(Math.random() * participantesUnicos.length);
const ganador = participantesUnicos[indiceAleatorio];

// 5. Mostrar la fecha y hora actual con Date
const ahora = new Date();
const fechaFormateada = ahora.toLocaleString("es-ES", {
  dateStyle: "medium",
  timeStyle: "medium"
});

console.log("\n RESULTADO DEL SORTEO ");
console.log(`Participante seleccionado: ${ganador}`);
console.log(`Sorteo realizado el: ${fechaFormateada}`);