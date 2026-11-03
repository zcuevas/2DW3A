GAMEZONE — EJERCICIO CORTO PHP + MYSQL
Tiempo: 45-60 minutos. No necesitas login, carrito ni panel admin.

PREPARACIÓN
1. Descomprime esta carpeta dentro de htdocs (XAMPP).
2. Inicia Apache y MySQL.
3. Importa database.sql desde phpMyAdmin.
4. Comprueba includes/conexion.php (usuario/contraseña).
5. Abre http://localhost/GameZone_Ejercicio/

ENUNCIADO
Una tienda necesita un catálogo sencillo de videojuegos.

PARTE A — MOSTRAR
- Consulta todos los videojuegos de la tabla.
- Muestra nombre, género, plataforma, precio y stock.
- Si no hay resultados, muestra un mensaje.
- Haz la consulta en una función de funciones_bd.php.

PARTE B — AÑADIR
- El formulario envía por POST.
- Recoge nombre, género, plataforma, precio y stock.
- Nombre, género y plataforma no pueden estar vacíos.
- Precio: numérico y mayor que 0.
- Stock: entero igual o mayor que 0.
- Si los datos son correctos, inserta el videojuego.
- Usa prepare(), bind_param() y execute().
- Muestra mensaje de éxito o error.

PARTE C — ORDEN Y SEGURIDAD
- Crea validaciones en funciones.php.
- Escapa los datos mostrados con htmlspecialchars().
- No concatenes datos del formulario dentro del SQL.

PISTAS
$_POST['nombre'] ?? '';  |  trim()  |  is_numeric()
filter_var($stock, FILTER_VALIDATE_INT)
SELECT * FROM videojuegos
INSERT INTO videojuegos (...) VALUES (?, ?, ?, ?, ?)
bind_param: s=texto, d=decimal, i=entero.
En bind_param pasa variables, no expresiones.

CHECKLIST
[ ] Se muestra el catálogo.
[ ] El formulario valida datos.
[ ] Se guarda un videojuego válido.
[ ] Hay funciones separadas.
[ ] Las consultas son preparadas.
[ ] Se usa htmlspecialchars() al mostrar texto.
