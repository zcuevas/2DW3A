// Fecha actual y fecha futura
const hoy = new Date();
const fechaFutura = new Date("2026-12-31");

// La diferencia se obtiene en milisegundos
const diferenciaMs = fechaFutura - hoy;

// Conversión de milisegundos a días (1000ms * 60s * 60m * 24h)
const msPorDia = 1000 * 60 * 60 * 24;
const diasFaltantes = Math.ceil(diferenciaMs / msPorDia);

console.log(`Faltan aproximadamente ${diasFaltantes} días hasta el ${fechaFutura.toLocaleDateString()}.`);

// Ampliación: fecha legible en español
const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
console.log(`Hoy es: ${hoy.toLocaleDateString('es-ES', opciones)}`);