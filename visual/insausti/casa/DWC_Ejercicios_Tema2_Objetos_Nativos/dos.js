/*Solicita mediante prompt el precio de un producto y la cantidad comprada. Calcula el importe total y muéstralo con 
exactamente dos decimales.
• Convierte correctamente los datos introducidos por el usuario.
• Comprueba que precio y cantidad contienen valores numéricos válidos.
• Si alguno de los datos no es válido, muestra un mensaje adecuado.
• Si son válidos, muestra el total con dos decimales.
*/

let precio = parseFloat(prompt("Introduce el precio del producto:"));
let cantidad = parseInt(prompt("Introduce las unidades:"), 10);

console.log(precio, cantidad);