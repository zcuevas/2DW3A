
fetch('https://jsonplaceholder.typicode.com/users/1')
  .then(response => response.json())
  .then(data => {
    document.getElementById("usuario").innerHTML = `
      <p>Nombre: ${data.name}</p>
      <p>Email: ${data.email}</p>
    `;
  })
  .catch(error => {console.error('Error:', error); });