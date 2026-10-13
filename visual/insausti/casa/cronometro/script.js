// --- 1. LÓGICA DEL RELOJ ---
function actualizarReloj() {
  const ahora = new Date();
  const horas = String(ahora.getHours()).padStart(2, '0');
  const minutos = String(ahora.getMinutes()).padStart(2, '0');
  const segundos = String(ahora.getSeconds()).padStart(2, '0');
  
  document.getElementById('reloj').textContent = `${horas}:${minutos}:${segundos}`;
}

actualizarReloj();
setInterval(actualizarReloj, 1000);


// --- 2. LÓGICA DEL CRONÓMETRO ---
let segundosTranscurridos = 0;
let idIntervalo = null;

function formatearTiempo(totalSegundos) {
  const hrs = String(Math.floor(totalSegundos / 3600)).padStart(2, '0');
  const mins = String(Math.floor((totalSegundos % 3600) / 60)).padStart(2, '0');
  const segs = String(totalSegundos % 60).padStart(2, '0');
  return `${hrs}:${mins}:${segs}`;
}

function actualizarDisplayCronometro() {
  document.getElementById('cronometro').textContent = formatearTiempo(segundosTranscurridos);
}

// Botón: Arrancar
document.getElementById('btn-arrancar').addEventListener('click', () => {
  if (idIntervalo === null) {
    idIntervalo = setInterval(() => {
      segundosTranscurridos++;
      actualizarDisplayCronometro();
    }, 1000);
  }
});

// Botón: Parar
document.getElementById('btn-parar').addEventListener('click', () => {
  if (idIntervalo !== null) {
    clearInterval(idIntervalo);
    idIntervalo = null;
  }
});

// Botón: Poner a 0
document.getElementById('btn-reset').addEventListener('click', () => {
  if (idIntervalo !== null) {
    clearInterval(idIntervalo);
    idIntervalo = null;
  }
  segundosTranscurridos = 0;
  actualizarDisplayCronometro();
});

// Botón: Escribir valor (Funciona tanto en marcha como parado PERO solo si es mayor a 00:00:00)
document.getElementById('btn-registrar').addEventListener('click', () => {
  if (segundosTranscurridos > 0) {
    const tiempoActual = formatearTiempo(segundosTranscurridos);
    const estado = (idIntervalo === null) ? "parado" : "en marcha";
    
    const nuevoElemento = document.createElement('li');
    nuevoElemento.textContent = `Tiempo (${estado}): ${tiempoActual}`;
    document.getElementById('lista-registros').appendChild(nuevoElemento);
  } else {
    alert("El cronómetro está a 0. Arráncalo primero para obtener un tiempo.");
  }
}); 

// Botón: Borrar todos los registros
document.getElementById('btn-limpiar').addEventListener('click', () => {
  const lista = document.getElementById('lista-registros');
  
  if (lista.children.length > 0) {
    lista.innerHTML = ''; // Vacía la lista por completo
  } else {
    alert("No hay ningún registro para borrar.");
  }
});