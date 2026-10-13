var nombre = "Camion";
const precio = 10.99;
let stockInicial = 100;
let stockActual = stockInicial;
let disponibilidad;
let unidadesVenta = 0;

if (stockActual > 0) {
    disponibilidad = true;
} else {
    disponibilidad = false;
}

// Mostrar los datos en consola.
console.log("Nombre:", nombre);
console.log("Precio:", precio);
console.log("Stock inicial:", stockInicial);
console.log("Disponibilidad:", disponibilidad);

// Mostrar el tipo de cada dato con typeof.
console.log("Tipo de nombre:", typeof nombre);
console.log("Tipo de precio:", typeof precio);
console.log("Tipo de stock:", typeof stockInicial);
console.log("Tipo de disponibilidad:", typeof disponibilidad);

// Calcular el precio de comprar 3 unidades.
unidadesVenta = 3;
let precioTotal = precio * unidadesVenta;
stockActual -= unidadesVenta; 
console.log("Precio total por " + unidadesVenta + " unidades:", precioTotal +"€");
    
// Simular la venta de 3 unidades y mostrar stock inicial, unidades vendidas y stock restante.
console.log("Stock inicial:", stockInicial);
console.log("Unidades vendidas:", unidadesVenta);
console.log("Stock restante:", stockActual);
