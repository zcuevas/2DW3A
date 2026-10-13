let producto = "Monitor LG";
let precio = 189.99; //usar '.' no ','
let unidades = 1;
let tipoCliente = "n";

let subtotal = 0;
let descuento = 0;
let total = 0;
const iva = 0.21;

producto = prompt("Indique producto:") || producto;
precio = Number(prompt("Indique precio:")) || precio;
unidades = Number(prompt("Indique número de unidades:")) || unidades;
tipoCliente = prompt("¿Es cliente VIP? (s/n)") || tipoCliente;



console.log(producto);
console.log(precio);
console.log(unidades);
//console.log(tipoCliente);

// Unidades | Descuento
// 1 a 4    | Sin descuento
// 5 a      | 9 5 %
// 10 o más | 10 %

// Si el cliente es VIP, se aplicará además un 5 % de descuento adicional.

// Una vez aplicados los descuentos, se calculará un IVA del 21 %.


subtotal = precio * unidades;
console.log("Subtotal: "+subtotal+"€");

switch (true) {
    case (unidades>=5 && unidades<=9):
        descuento = 5/100;
        console.log("Descuento por cantidad: "+descuento*100+"%");
        break;

    case (unidades>=10):
        descuento = 10/100;
        console.log("Descuento por cantidad: "+descuento*100+"%");
        break;
}

if (tipoCliente === "s") {
    descuento = descuento + 5/100;
    console.log("Cliente VIP: Sí");
    console.log("Descuento VIP: 5 %");
} else {
    console.log("Cliente VIP: No");
}

total = subtotal * descuento;
subtotal = subtotal - total;
console.log("Base después de descuentos: "+subtotal.toFixed(2)+"€");

total = 0;
total = subtotal * iva;
console.log("IVA (21 %): "+total.toFixed(2)+"€");

subtotal = total + subtotal;
console.log("Total: "+subtotal.toFixed(2)+"€");