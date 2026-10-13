// 1. Pedir los datos al usuario
const PRODUCTO = prompt("Ingresa el nombre del producto:");
const PRECIO = parseFloat(prompt("Ingresa el precio unitario del producto:"));
const UNIDADES = parseInt(prompt("Ingresa la cantidad de unidades a comprar:"), 10);  //parseInt se usa para convertir a número entero, y el segundo parámetro es la base (10 para decimal)
const VIP = confirm("¿El cliente es VIP? (Aceptar = Sí, Cancelar = No)");

// 2. Variables fijas y subtotal inicial
const IVA_PORCENTAJE = 21;
const subTotal = PRECIO * UNIDADES;

// 3. Reglas: Descuento por cantidad
let pctDescuentoCantidad = 0; // Porcentaje de descuento por cantidad

if (UNIDADES >= 5 && UNIDADES <= 9) {
    pctDescuentoCantidad = 5;
} else if (UNIDADES >= 10) {
    pctDescuentoCantidad = 10;
}

// Calcular importe tras el descuento por cantidad
const montoDescCantidad = subTotal * (pctDescuentoCantidad / 100); // Monto de descuento por cantidad = euros que se descuentan
const baseTrasCantidad = subTotal - montoDescCantidad; // lo que queda después de aplicar el descuento por cantidad

// 4. Reglas: Descuento VIP (5% adicional sobre la base resultante)
let pctDescuentoVIP = 0;
if (VIP === true) {
    pctDescuentoVIP = 5;
}

const montoDescVIP = baseTrasCantidad * (pctDescuentoVIP / 100); // euros que se descuentan por ser VIP

// 5. Cálculos finales (Base, IVA y Total)
const baseDespuesDescuentos = baseTrasCantidad - montoDescVIP; // preecio con el descuento VIP aplicado
const montoIVA = baseDespuesDescuentos * (IVA_PORCENTAJE / 100); // euros que se pagan de IVA
const total = baseDespuesDescuentos + montoIVA; // precio final a pagar por el cliente con el IVA incluido

// 6. Impresión del resumen por consola usando Template Literals (con saltos de línea)
/* FORMA MAS OPTIMA DE HACERLO
console.log(`===== RESUMEN DEL PEDIDO =====
Producto: ${PRODUCTO}
Precio unitario: ${PRECIO.toFixed(2)} €
Unidades: ${UNIDADES}

Subtotal: ${subTotal.toFixed(2)} €
Descuento por cantidad: ${pctDescuentoCantidad} %
Cliente VIP: ${VIP ? "Sí" : "No"}
Descuento VIP: ${pctDescuentoVIP} %

Base después de descuentos: ${baseDespuesDescuentos.toFixed(2)} €
IVA (${IVA_PORCENTAJE} \%):${montoIVA.toFixed(2)} €
TOTAL: ${total.toFixed(2)} €`); 
*/

console.log("===== RESUMEN DEL PEDIDO =====");
console.log("Producto:", PRODUCTO);
console.log("Precio unitario:", PRECIO.toFixed(2) + " €");
console.log("Unidades:", UNIDADES);
console.log(""); // Línea en blanco
console.log("Subtotal:", subTotal.toFixed(2) + " €");
console.log("Descuento por cantidad:", pctDescuentoCantidad + " %");
console.log("Cliente VIP:", VIP ? "Sí" : "No");
console.log("Descuento VIP:", pctDescuentoVIP + " %");
console.log(""); // Línea en blanco
console.log("Base después de descuentos:", baseDespuesDescuentos.toFixed(2) + " €");
console.log("IVA (21 %):", montoIVA.toFixed(2) + " €");
console.log("TOTAL:", total.toFixed(2) + " €");

// to fix(2) se usa para mostrar los números con 2 decimales 