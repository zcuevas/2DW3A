const tiradas = [];
let suma = 0;
let contadorSeis = 0;

// Simular los 20 lanzamientos
for (let i = 0; i < 20; i++) {
  // Generar entero aleatorio entre 1 y 6
  let dado = Math.floor(Math.random() * 6) + 1;
  
  // Añadir al final del array
  tiradas.push(dado);
  suma += dado;

  // Contar cuántos 6 han salido
  if (dado === 6) {
    contadorSeis++;
  }
}

// Calcular máximo, mínimo y media
let maximo = Math.max(...tiradas);
let minimo = Math.min(...tiradas);
let media = suma / tiradas.length;

// ==========================================
// RESULTADOS
// ==========================================
console.log("Tiradas obtenidas:", tiradas.join(", "));
console.log("Valor máximo:", maximo);
console.log("Valor mínimo:", minimo);
console.log("Media de las tiradas:", media.toFixed(2));
console.log("Veces que ha salido el 6:", contadorSeis);