const codigos = ["A12", "B07", "A12", "C03", "B07", "D18", "C03"];

// 1. Eliminar duplicados pasando el array a un Set
const codigosUnicos = new Set(codigos);

// 2. Mostrar cuántos códigos diferentes existen
console.log(`Número de códigos únicos: ${codigosUnicos.size}`);

// 3. Comprobar si está inscrito "B07"
console.log(`¿Está inscrito 'B07'?: ${codigosUnicos.has("B07")}`);

// 4. Añadir "E21" y eliminar "C03"
codigosUnicos.add("E21");
codigosUnicos.delete("C03");

// 5. Mostrar el contenido final (convertido de nuevo a Array para visualizarlo cómodo)
console.log("Contenido final:", Array.from(codigosUnicos));