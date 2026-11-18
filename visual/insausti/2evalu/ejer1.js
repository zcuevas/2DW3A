fetch("https://jsonplaceholder.typicode.com/todos/1")
  .then(respuesta => respuesta.json()) // convierte la respuesta a JSON
  .then(datos => console.log(datos))    // usa los datos
  .catch(error => console.error("Error:", error)); // maneja errores