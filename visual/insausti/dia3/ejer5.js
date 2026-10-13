// 1. Crear el Map con el stock inicial
const stock = new Map([
  ["Teclado", 12],
  ["Ratón", 8],
  ["Monitor", 5],
  ["Webcam", 0]
]);

// 2. Consultar el stock de un producto
console.log(`Stock actual de Ratón: ${stock.get("Ratón")}`);

// 3. Modificar el stock tras una venta (ej. vender 1 unidad de Monitor)
stock.set("Monitor", stock.get("Monitor") - 1);

// 4. Añadir un producto nuevo
stock.set("Auriculares", 15);

// 5. Comprobar si existe un producto determinado
console.log(`¿Existe 'Teclado' en inventario?: ${stock.has("Teclado")}`);

// 6. Mostrar todos los productos y su stock (incluyendo la ampliación de aviso)
console.log("\n--- INVENTARIO DE PRODUCTOS ---");
stock.forEach((cantidad, producto) => {
  if (cantidad === 0) {
    console.warn(`⚠️ ${producto} → ${cantidad} (¡SIN STOCK!)`);
  } else {
    console.log(`${producto} → ${cantidad}`);
  }
});