# Guía práctica de PHP + MySQL
## Método paso a paso para exámenes y ejercicios de clase
**Versión 1 — basada en el proyecto de la tienda de videojuegos**

> Objetivo: tener un método que puedas reutilizar en ejercicios PHP parecidos. No memorices páginas enteras: aprende el orden de trabajo, reconoce los patrones y adapta los nombres de tablas, campos y acciones al enunciado.

---

# 1. Antes de escribir código: entiende el ejercicio

Lee el enunciado completo una vez y vuelve a leerlo buscando estas cosas:

1. **¿Qué entidad se gestiona?** Usuarios, productos, videojuegos, pedidos, reservas...
2. **¿Qué operaciones hay?** Crear, consultar, modificar, borrar, iniciar sesión, comprar...
3. **¿Quién puede hacerlo?** Cualquier visitante, usuario registrado o administrador.
4. **¿De dónde vienen los datos?**
   - `$_GET`: datos de la URL, normalmente filtros, búsquedas e identificadores.
   - `$_POST`: datos enviados por formularios, normalmente altas, cambios y acciones.
   - `$_SESSION`: datos que deben mantenerse entre páginas, como el usuario o el carrito.
5. **¿Dónde se guardan?** En una tabla de la base de datos o temporalmente en sesión/cookie.
6. **¿Qué validaciones exige?** Campos obligatorios, formato, límites, stock, permisos, duplicados...
7. **¿Qué debe ocurrir al terminar?** Mostrar un mensaje, redirigir, actualizar una lista, etc.

## Haz una mini-lista de requisitos

Por ejemplo, para añadir un videojuego:

- Solo puede acceder un administrador.
- El formulario pide nombre, género, plataforma, precio y stock.
- Los campos de texto no pueden estar vacíos.
- La plataforma debe estar entre las permitidas.
- El precio debe ser numérico y mayor que cero.
- El stock debe ser entero y no negativo.
- No debe existir ya el mismo juego para esa plataforma.
- Si se guarda correctamente, volver al listado.

Esta lista se convierte en el orden de tu código.

---

# 2. Revisa el proyecto antes de tocar nada

No empieces creando código a ciegas. Inspecciona:

- **Estructura de carpetas:** dónde están las páginas, `includes` y páginas de administración.
- **Conexión:** localiza `includes/conexion.php` y comprueba el nombre de la variable de conexión. En nuestro ejercicio era `$conexion`.
- **Funciones existentes:** revisa `funciones.php` y `funciones_bd.php` para no duplicar funciones.
- **Base de datos:** abre el `.sql` o revisa las tablas, columnas, tipos, claves y relaciones.
- **Páginas parecidas:** busca una página que haga algo similar. Por ejemplo, usa `admin/anadir.php` como referencia para otra alta.

## Comprueba siempre los nombres reales

No inventes columnas. Si la tabla tiene `password`, no escribas `contrasena` en la consulta. Si la conexión se llama `$conexion`, no uses `$conn` sin motivo.

En el proyecto practicado:
- `usuarios`: `id`, `nombre`, `email`, `password`, `rol`.
- `videojuegos`: `id`, `nombre`, `genero`, `plataforma`, `precio`, `stock`.
- La conexión MySQLi se guardaba en `$conexion`.

---

# 3. Decide qué archivos necesitas

Una separación habitual es:

| Archivo | Responsabilidad |
|---|---|
| `includes/conexion.php` | Conectar con MySQL |
| `includes/funciones.php` | Validaciones, cálculos y comprobaciones generales |
| `includes/funciones_bd.php` | Consultas SQL y operaciones con la base de datos |
| `header.php` / `footer.php` | Partes comunes de la interfaz |
| `registro.php`, `login.php`, etc. | Recibir datos, coordinar la lógica y mostrar la página |
| `admin/...` | Acciones reservadas a administradores |

**Regla para recordar:**
- Si la función calcula o valida datos sin consultar MySQL, suele ir en `funciones.php`.
- Si ejecuta SQL, suele ir en `funciones_bd.php`.
- La página PHP coordina el proceso: recibe, valida, llama a las funciones y decide qué mostrar.

No todos los ejercicios tienen que usar exactamente estos archivos. Respeta la estructura que te den.

---

# 4. Orden recomendado para empezar cualquier página PHP

Este es el esqueleto mental que debes seguir. No todas las páginas necesitan todos los pasos.

## Paso 1. Iniciar sesión si vas a usar sesiones

Debe hacerse antes de enviar HTML:

```php
<?php
session_start();
```

Lo necesitas para consultar o modificar `$_SESSION`. No es necesario iniciar sesión en absolutamente todas las páginas si no usan sesiones.

## Paso 2. Cargar los archivos necesarios

```php
require_once 'includes/conexion.php';
require_once 'includes/funciones.php';
require_once 'includes/funciones_bd.php';
```

En una página dentro de `admin/`, las rutas normalmente suben un nivel:

```php
require_once '../includes/conexion.php';
```

`require_once` evita incluir el mismo archivo varias veces.

## Paso 3. Preparar variables

Inicializa los mensajes y valores que vayas a utilizar:

```php
$mensaje = '';
```

Si vas a usar una variable más adelante, piensa qué valor tendrá si no se cumple ninguna condición. Por ejemplo:

```php
$videojuego = null;
```

Esto evita variables sin definir.

## Paso 4. Comprobar permisos

Hazlo antes de mostrar HTML y antes de ejecutar la acción protegida:

```php
if (!esAdmin()) {
    header('Location: ../login.php');
    exit;
}
```

No basta con ocultar un enlace de administración: también hay que proteger la página que realiza la operación.

## Paso 5. Detectar el tipo de petición

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar formulario
}
```

- `GET`: consultar, buscar, filtrar, ordenar o paginar.
- `POST`: registrar, iniciar sesión, añadir, actualizar o eliminar mediante formulario.

## Paso 6. Recoger los datos

```php
$nombre = trim($_POST['nombre'] ?? '');
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
```

- `?? ''` evita avisos si la clave no existe.
- `trim()` elimina espacios al principio y al final.
- `filter_input()` puede validar directamente un dato recibido por GET o POST.

## Paso 7. Validar los datos

Valida antes de llamar a la función que guarda o modifica datos. Consulta el apartado 6.

## Paso 8. Llamar a la función adecuada

La página no debería tener toda la consulta SQL mezclada con el HTML. Llama a una función de `funciones_bd.php`.

## Paso 9. Decidir el resultado

- Si todo va bien: redirige o prepara los datos que se mostrarán.
- Si hay un error: guarda un mensaje comprensible.
- Después de `header('Location: ...')`, utiliza `exit;`.

## Paso 10. Mostrar el HTML

Incluye `header.php` y muestra mensajes y datos. Escapa los textos que proceden de usuarios o de la base de datos con `htmlspecialchars()`.

**Muy importante:** no debe haberse enviado salida HTML, espacios o texto antes de una redirección con `header()`.

---

# 5. Cómo diseñar una función antes de programarla

Antes de escribir una función, contesta estas cuatro preguntas:

1. ¿Qué tarea concreta realiza?
2. ¿Qué datos necesita recibir? Son los parámetros.
3. ¿Qué operación hace?
4. ¿Qué debe devolver?

Ejemplo: buscar un videojuego por su ID.

- Tarea: obtener un videojuego.
- Parámetros: conexión e ID.
- Operación: ejecutar un `SELECT`.
- Devuelve: un array asociativo si existe, o `null` si no existe.

```php
function obtenerVideojuego($conexion, $id) {
    $sql = "SELECT * FROM videojuegos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $videojuego = $resultado->fetch_assoc();

    $stmt->close();
    return $videojuego;
}
```

## Diferencia entre funciones generales y funciones de base de datos

Ejemplos de `funciones.php`:
- `validarId($id)`
- `validarCantidad($cantidad)`
- `validarPrecio($precio)`
- `calcularSubtotal($precio, $cantidad)`
- `calcularTotal($lineas)`
- `estaLogueado()`
- `esAdmin()`

Ejemplos de `funciones_bd.php`:
- `obtenerVideojuego($conexion, $id)`
- `obtenerUsuarioPorEmail($conexion, $email)`
- `existeEmail($conexion, $email)`
- `insertarUsuario(...)`
- `existeVideojuego(...)`
- `insertarVideojuego(...)`

Una función debe hacer una tarea clara. Evita funciones gigantes que validen, consulten, impriman HTML y redirijan a la vez.

---

# 6. Validación: qué comprobar y en qué orden

No confíes en que el formulario del navegador envíe datos correctos. La validación importante se repite en PHP, en el servidor.

## Orden habitual

1. Recoger los datos.
2. Limpiar lo que corresponda (`trim` para textos).
3. Comprobar campos obligatorios.
4. Comprobar formatos y tipos.
5. Comprobar rangos y reglas del ejercicio.
6. Comprobar duplicados o existencia en la base de datos.
7. Solo entonces insertar o actualizar.

## Ejemplos frecuentes

```php
// Texto obligatorio
if ($nombre === '') {
    $mensaje = 'El nombre es obligatorio.';
}

// Email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $mensaje = 'El email no es válido.';
}

// Entero positivo
$cantidad = filter_var($_POST['cantidad'] ?? '', FILTER_VALIDATE_INT);
if ($cantidad === false || $cantidad <= 0) {
    $mensaje = 'La cantidad debe ser un entero mayor que cero.';
}

// Precio positivo
$precio = filter_var($_POST['precio'] ?? '', FILTER_VALIDATE_FLOAT);
if ($precio === false || $precio <= 0) {
    $mensaje = 'El precio debe ser mayor que cero.';
}

// Stock: entero igual o mayor que cero
$stock = filter_var($_POST['stock'] ?? '', FILTER_VALIDATE_INT);
if ($stock === false || $stock < 0) {
    $mensaje = 'El stock no es válido.';
}

// Opción permitida
$permitidas = ['PC', 'PS5', 'Xbox', 'Switch'];
if (!in_array($plataforma, $permitidas, true)) {
    $mensaje = 'La plataforma no es válida.';
}
```

**Ojo con las diferencias:**
- Cantidad de unidades: normalmente entero mayor que cero.
- Stock: puede permitir cero.
- Precio: número mayor que cero.
- ID: entero positivo.
- Un campo obligatorio no se valida igual que uno opcional.

Para evitar ejecutar el guardado cuando hay errores:

```php
if ($mensaje === '') {
    // Comprobar duplicado y guardar
}
```

Inicializa siempre `$mensaje = '';` antes de estas comprobaciones.

---

# 7. MySQLi: patrón que debes reconocer en el examen

Para datos que vienen del usuario, utiliza consultas preparadas.

## SELECT de un solo registro

```php
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();
```

## INSERT

```php
$sql = "INSERT INTO videojuegos (nombre, genero, plataforma, precio, stock)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssdi", $nombre, $genero, $plataforma, $precio, $stock);
$resultado = $stmt->execute();
$stmt->close();
```

## UPDATE

```php
$sql = "UPDATE videojuegos
        SET nombre = ?, precio = ?, stock = ?
        WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sdii", $nombre, $precio, $stock, $id);
$resultado = $stmt->execute();
$stmt->close();
```

## DELETE

```php
$sql = "DELETE FROM videojuegos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$resultado = $stmt->execute();
$stmt->close();
```

## Qué significa cada método

| Método | Para qué sirve |
|---|---|
| `prepare()` | Prepara la consulta SQL con marcadores `?` |
| `bind_param()` | Asocia variables a los marcadores |
| `execute()` | Ejecuta la consulta |
| `get_result()` | Obtiene el resultado de un SELECT |
| `fetch_assoc()` | Obtiene una fila como array asociativo |
| `fetch_all(MYSQLI_ASSOC)` | Obtiene todas las filas como array |
| `num_rows` | Número de filas del resultado |
| `close()` | Cierra el statement |

## Tipos de `bind_param`

- `i`: entero (`int`).
- `d`: decimal / número de tipo double.
- `s`: texto (`string`).
- `b`: dato binario.

El orden de las letras debe coincidir exactamente con el orden de las variables. Ejemplo: `"sssdi"` corresponde a texto, texto, texto, decimal y entero.

**Error típico:** escribir cinco `?` y pasar cuatro variables, o poner `"ssdi"` cuando se envían cinco. Cuenta marcadores, letras y variables.

Los marcadores `?` sirven para valores, no para nombres de tabla, columnas ni fragmentos `ORDER BY`. Si necesitas ordenar dinámicamente, utiliza una lista cerrada de opciones permitidas.

---

# 8. Patrones de ejercicios del proyecto

## A. Registro de usuario

Orden recomendado:

1. `session_start()` si se usan sesiones.
2. Incluir conexión y funciones.
3. Inicializar `$mensaje`.
4. Comprobar que la petición sea POST.
5. Recoger nombre, email, contraseña y repetición.
6. Validar campos obligatorios.
7. Validar formato de email y longitud mínima de contraseña.
8. Comprobar que las contraseñas coinciden.
9. Comprobar si el email ya existe.
10. Crear el hash con `password_hash()`.
11. Llamar a `insertarUsuario()`.
12. Si funciona, redirigir al login; si no, mostrar error.
13. Incluir la cabecera y mostrar el formulario/mensaje.

Contraseñas:
```php
$hash = password_hash($password, PASSWORD_DEFAULT);
```
Nunca guardes la contraseña en texto plano.

## B. Inicio de sesión

1. Recoger email y contraseña.
2. Buscar al usuario por email.
3. Comprobar que existe.
4. Verificar la contraseña:
```php
password_verify($password, $usuario['password'])
```
5. Si es correcta, regenerar el ID de sesión:
```php
session_regenerate_id(true);
```
6. Guardar en `$_SESSION` los datos necesarios, por ejemplo ID, nombre y rol.
7. Redirigir.

No compares la contraseña escrita directamente con el hash de la base de datos. Se usa `password_verify()`.

## C. Cerrar sesión

1. Iniciar sesión.
2. Vaciar `$_SESSION`.
3. Eliminar la cookie de sesión si corresponde.
4. Ejecutar `session_destroy()`.
5. Redirigir y terminar con `exit`.

No borres cookies de preferencias que no tengan relación con la sesión.

## D. Catálogo con búsqueda, filtros y orden

1. Recoger filtros con `$_GET`.
2. Dar valores por defecto si no vienen.
3. Validar las opciones permitidas.
4. Recoger página actual y limitarla a un entero válido.
5. Calcular el desplazamiento:
```php
$offset = ($pagina - 1) * $porPagina;
```
6. Llamar a una función de búsqueda en la base de datos.
7. Llamar a otra función para contar resultados.
8. Calcular páginas:
```php
$totalPaginas = ceil($totalResultados / $porPagina);
```
9. Mostrar resultados y enlaces de paginación.

Conceptos:
- `LIKE`: búsqueda parcial.
- `%texto%`: contiene ese texto.
- `ORDER BY`: orden.
- `ASC`: ascendente.
- `DESC`: descendente.
- `LIMIT`: máximo de filas.
- `OFFSET`: desde qué fila empezar.
- `COUNT(*)`: contar filas.
- `http_build_query()`: construir una cadena de parámetros para enlaces conservando filtros.

Si el usuario elige el orden, no insertes directamente cualquier texto de `$_GET` en SQL. Mapea las opciones a fragmentos SQL fijos y permitidos.

## E. Detalle de un elemento

1. Recoger el ID desde GET.
2. Validar que sea entero y positivo.
3. Inicializar el resultado a `null`.
4. Si el ID es válido, llamar a `obtenerVideojuego()`.
5. Si no existe, mostrar un mensaje o página de error.
6. Si existe, mostrar sus datos escapados.
7. Si hay una acción (por ejemplo añadir al carrito), usar un formulario POST.

## F. Carrito con sesiones

En el ejercicio, el carrito guarda en sesión una estructura sencilla:

```php
$_SESSION['carrito'] = [
    3 => 2, // videojuego con ID 3, cantidad 2
    8 => 1  // videojuego con ID 8, cantidad 1
];
```

La clave es el ID y el valor es la cantidad.

Orden habitual:

1. Iniciar sesión.
2. Crear el carrito si todavía no existe.
3. Detectar la acción POST: añadir, actualizar o eliminar.
4. Validar ID y cantidad.
5. Consultar el producto en la base de datos.
6. Comprobar que existe y que hay stock suficiente.
7. Actualizar `$_SESSION['carrito']`.
8. Volver a consultar los datos actuales de cada producto en la base de datos.
9. Calcular subtotales y total.
10. Mostrar el carrito.

Cálculos:
```php
$subtotal = $precio * $cantidad;
$total += $subtotal;
```

No confíes en un precio enviado desde el navegador. El precio correcto se recupera de la base de datos.

## G. Alta de producto (administración)

1. Iniciar sesión e incluir funciones.
2. Comprobar `esAdmin()` antes de mostrar la página.
3. Inicializar `$mensaje`.
4. Si es POST, recoger los campos.
5. Validar obligatorios, tipos, rangos y opciones.
6. Comprobar duplicados si el ejercicio lo requiere.
7. Llamar a `insertarVideojuego()`.
8. Si funciona, redirigir; si falla, preparar mensaje.
9. Mostrar formulario y mensaje.

Para modificar o eliminar un producto, el patrón es parecido: validar el ID, comprobar que el registro existe, comprobar permisos y ejecutar el `UPDATE` o `DELETE` preparado.

---

# 9. Seguridad y buenas prácticas que pueden preguntarte

## Consultas preparadas
Evitan construir consultas concatenando directamente datos del usuario y ayudan a prevenir inyección SQL.

## `htmlspecialchars()`
Escapa texto al mostrarlo en HTML:
```php
echo htmlspecialchars($videojuego['nombre']);
```
Protege la salida frente a contenido HTML/JavaScript introducido como texto.

## `password_hash()` y `password_verify()`
- `password_hash()`: genera un hash seguro para guardar.
- `password_verify()`: comprueba una contraseña contra ese hash.

## Sesiones
- `session_start()`: inicia o recupera la sesión.
- `$_SESSION`: almacena datos entre peticiones.
- `session_regenerate_id(true)`: renueva el identificador tras iniciar sesión.
- `session_destroy()`: destruye la sesión.

## Validar permisos en el servidor
No es seguridad suficiente ocultar botones. Comprueba el rol en la página que ejecuta la acción.

## Redirecciones
`header('Location: pagina.php')` debe ejecutarse antes de enviar contenido. Después, usa `exit`.

## Validación del servidor
La validación HTML/JavaScript ayuda al usuario, pero PHP debe validar siempre los datos recibidos.

**Ampliación para futuros temas:** según lo que pida el curso, también pueden aparecer tokens CSRF, transacciones, control de errores, restricciones de base de datos y protección adicional de cookies. No los des por incluidos si el enunciado o el temario no los pide.

---

# 10. Errores típicos y cómo detectarlos

| Error | Qué revisar |
|---|---|
| `Undefined array key` | ¿Existe la clave? Usa `??` o comprueba `isset()` |
| `Undefined variable` | ¿Inicializaste la variable antes del `if`? |
| `headers already sent` | ¿Se imprimió HTML, texto o espacios antes de `header()`? |
| No redirige | ¿Hay salida previa? ¿Falta `exit`? |
| No conecta a la BD | Ruta del include, credenciales y nombre de `$conexion` |
| SQL no funciona | Tabla, columnas, número de `?`, tipos y variables de `bind_param` |
| No encuentra un registro | ¿El ID/email es correcto? ¿`fetch_assoc()` devuelve `null`? |
| No guarda | ¿Se ejecuta `execute()`? ¿Se comprueba su resultado? ¿Hay errores SQL? |
| Formulario no procesa | ¿El `method` es POST? ¿Los `name` coinciden con `$_POST`? |
| Variable de resultado no definida | Inicialízala antes de las condiciones |
| Ruta incorrecta | Desde qué carpeta se ejecuta el archivo: quizá necesitas `../` |
| Mensaje no aparece | ¿Se imprime después de procesar POST? ¿Se redirige antes? |

Cuando algo falla, no cambies diez cosas a la vez. Comprueba por orden: ruta → datos recibidos → validación → función llamada → SQL → resultado → HTML.

---

# 11. Preguntas teóricas que pueden aparecer

Practica responderlas con tus palabras:

1. ¿Qué diferencia hay entre GET y POST?
2. ¿Para qué sirve `session_start()`?
3. ¿Qué diferencia hay entre `$_SESSION`, `$_GET` y `$_POST`?
4. ¿Qué hace `require_once`?
5. ¿Qué diferencia hay entre `include` y `require`?
6. ¿Qué es una consulta preparada y por qué se utiliza?
7. ¿Qué significan `i`, `d`, `s` y `b` en `bind_param()`?
8. ¿Qué diferencia hay entre `execute()`, `get_result()` y `fetch_assoc()`?
9. ¿Qué devuelve `fetch_assoc()` cuando no hay fila?
10. ¿Para qué sirven `password_hash()` y `password_verify()`?
11. ¿Por qué se utiliza `htmlspecialchars()`?
12. ¿Qué hace `filter_var()`?
13. ¿Para qué sirven `trim()`, `isset()` y `empty()`?
14. ¿Qué diferencia hay entre `return` y `echo`?
15. ¿Qué diferencia hay entre `WHERE`, `ORDER BY` y `LIMIT`?
16. ¿Qué hacen `COUNT(*)`, `LIKE` y `OFFSET`?
17. ¿Por qué se valida el ID antes de consultar?
18. ¿Por qué se comprueba el rol en el servidor?
19. ¿Por qué se usa `exit` después de una redirección?
20. ¿Por qué no debemos confiar en el precio enviado por un formulario?

---

# 12. Cómo afrontar un examen práctico

Cuando te entreguen el enunciado:

### Primera pasada: entender
- Lee todo.
- Marca las páginas o funciones que hay que completar.
- Identifica tablas y campos.
- Anota permisos, entradas y validaciones.

### Segunda pasada: preparar
- Revisa archivos existentes.
- Localiza conexión y funciones.
- Decide qué función general y qué función de BD necesitas.
- Escribe primero la estructura y el orden de los pasos.

### Tercera pasada: programar
- Empieza por la lógica PHP, no por el diseño HTML.
- Implementa una parte pequeña.
- Prueba esa parte antes de seguir.
- Reutiliza funciones existentes.
- Mantén las consultas SQL separadas cuando la estructura del ejercicio lo permita.

### Cuarta pasada: comprobar
- ¿Qué pasa si falta un campo?
- ¿Qué pasa si el ID no es válido?
- ¿Qué pasa si el registro no existe?
- ¿Qué pasa si el usuario no tiene permisos?
- ¿Qué pasa si la consulta falla?
- ¿Se muestra correctamente el mensaje?
- ¿Se escapan los datos al imprimirlos?
- ¿Las redirecciones ocurren antes del HTML?

### Si te quedas bloqueado
1. Escribe en un comentario qué debe hacer el bloque.
2. Identifica qué datos necesita.
3. Decide qué función debería resolverlo.
4. Busca un patrón parecido en otra página.
5. Implementa la versión mínima y prueba.
6. No intentes resolver todo el ejercicio de golpe.

---

# 13. Mini-plantillas para memorizar el patrón

## Página que procesa un formulario

```php
<?php
session_start();
require_once 'includes/conexion.php';
require_once 'includes/funciones.php';
require_once 'includes/funciones_bd.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recoger datos
    // 2. Validar
    // 3. Si no hay errores, llamar a función de BD
    // 4. Comprobar resultado
    // 5. Redirigir si ha ido bien
}

require_once 'includes/header.php';
?>

<!-- Formulario y mensaje -->

<?php require_once 'includes/footer.php'; ?>
```

## Función de base de datos

```php
function nombreFuncion($conexion, $dato) {
    $sql = "SELECT ... WHERE campo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $dato);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();

    $stmt->close();
    return $fila;
}
```

Adapta SQL, tipo (`i`, `d`, `s`, `b`) y retorno a cada operación. Un `INSERT`, `UPDATE` o `DELETE` suele devolver el resultado de `execute()` en vez de una fila.

---

# 14. Checklist final reutilizable

Antes de dar por terminado un ejercicio, repasa:

- [ ] He entendido qué pide cada apartado.
- [ ] He comprobado nombres de tablas y columnas.
- [ ] He revisado las funciones que ya existían.
- [ ] He incluido los archivos con rutas correctas.
- [ ] He iniciado sesión antes de usar `$_SESSION`.
- [ ] He comprobado permisos en el servidor.
- [ ] He recogido los datos desde GET o POST correctamente.
- [ ] He inicializado variables y mensajes.
- [ ] He validado todos los datos en PHP.
- [ ] Uso consultas preparadas para los datos del usuario.
- [ ] Los tipos de `bind_param()` coinciden con las variables.
- [ ] Compruebo si la consulta ha funcionado.
- [ ] Uso `password_hash()` y `password_verify()` para contraseñas.
- [ ] Uso `htmlspecialchars()` al mostrar texto dinámico.
- [ ] No envío HTML antes de una redirección.
- [ ] Uso `exit` después de `header('Location: ...')`.
- [ ] He probado casos correctos y casos de error.

---

# 15. Glosario rápido

| Concepto | Significado |
|---|---|
| GET | Datos que llegan por la URL |
| POST | Datos enviados en el cuerpo de una petición, normalmente desde un formulario |
| SESSION | Datos mantenidos entre peticiones del usuario |
| SQL | Lenguaje para consultar y modificar bases de datos |
| SELECT | Consultar datos |
| INSERT | Insertar datos |
| UPDATE | Modificar datos |
| DELETE | Eliminar datos |
| WHERE | Filtrar registros |
| PRIMARY KEY | Identificador principal de una tabla |
| AUTO_INCREMENT | Genera automáticamente el siguiente identificador |
| UNIQUE | Impide valores duplicados en una columna o combinación |
| `null` | Ausencia de valor |
| Array asociativo | Array que utiliza claves con nombre |
| `return` | Devuelve un valor desde una función |
| `echo` | Escribe contenido en la salida |
| Redirect | Enviar al navegador a otra página |

---

# 16. Cómo ampliar esta guía durante el curso

Añade una nueva sección cada vez que aparezca un tema:

- **Fecha / tema:** qué has aprendido.
- **Cuándo se utiliza:** en qué tipo de ejercicio aparece.
- **Orden de trabajo:** pasos para resolverlo.
- **Código mínimo:** ejemplo pequeño que entiendas.
- **Errores típicos:** qué te falló y cómo lo solucionaste.
- **Preguntas de examen:** preguntas que podrían hacerte.

No pegues bloques de código sin explicación. Escribe al lado qué recibe, qué hace y qué devuelve cada parte.

**Regla principal:** primero entiende el flujo; después escribe el código. En ejercicios similares cambian los nombres y las reglas del negocio, pero el método suele repetirse: recibir → validar → comprobar permisos → consultar/guardar → comprobar resultado → mostrar o redirigir.
