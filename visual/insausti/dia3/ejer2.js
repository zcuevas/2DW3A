const tiradas = [];
const TOTAL_TIRADAS = 10;

// Generar 10 tiradas de un dado de 6 caras (número entero entre 1 y 6)
for (let i = 0; i < TOTAL_TIRADAS; i++) {
  // Math.floor(Math.random() * (max - min + 1)) + min
  const tirada = Math.floor(Math.random() * 6) + 1;
  tiradas.push(tirada);
}

console.log("Tiradas obtenidas:", tiradas);

// Calcular máximo, mínimo y suma
const maximo = Math.max(...tiradas);
const minimo = Math.min(...tiradas);
const suma = tiradas.reduce((acc, val) => acc + val, 0);

// Calcular la media
const media = (suma / TOTAL_TIRADAS).toFixed(2);

console.log(`Valor máximo: ${maximo}`);
console.log(`Valor mínimo: ${minimo}`);
console.log(`Media de las tiradas: ${media}`);