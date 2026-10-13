"use strict"; //para evitar errores de sintaxis y malas prácticas como no declarar variables

alert("Bienvenido a la página");

console.log("Este mensaje se muestra en la consola del navegador");

let nombre = prompt("¿Cómo te llamas?");
alert("Hola, " + nombre);

console.info("El usuario se llama:", nombre);


let seguro = confirm("¿Quieres continuar?");
console.log("Resultado:", seguro); 

let n1=5; //usar siempre let en vez de var 
alert(n1);

if (seguro) {
    let n1=3;
    console.log(++n1);
}

console.log("n1 viejo:", n1);
