# Ejercicio 8 — Proyecto final GameWorld

## Situación
GameWorld necesita una tienda online para consultar videojuegos, registrar clientes, gestionar carritos, realizar pedidos y administrar productos.

## Actividades
1. **Organización**: crear `includes/funciones.php` y `includes/funciones_bd.php`. Todas las consultas SQL estarán en funciones de `funciones_bd.php`; todas las funciones de uso general, en `funciones.php`. Reutilizar `header.php` y `footer.php`.
2. **Usuarios**: implementar registro, comprobación de correos duplicados, `password_hash`, `password_verify`, inicio y cierre de sesión. Solo los administradores podrán acceder a `/admin`.
3. **Catálogo**: implementar búsqueda por nombre, filtro por plataforma, ordenación por precio, paginación y detalles. Los filtros deberán funcionar conjuntamente.
4. **Carrito**: almacenar en sesión IDs y cantidades, añadir videojuegos, actualizar cantidades y eliminar líneas. Consultar precios y stock reales en MySQL y calcular subtotales y total con funciones reutilizables.
5. **Pedidos**: solo los clientes identificados podrán comprar. Registrar pedido y líneas, descontar stock y vaciar el carrito solo tras una operación correcta. Utilizar una transacción (`BEGIN`/`COMMIT`/`ROLLBACK`) y bloquear las filas de stock durante la comprobación para impedir ventas simultáneas por encima del stock disponible.
6. **Historial**: mostrar los pedidos del usuario identificado y sus líneas. Ningún usuario podrá consultar pedidos ajenos.
7. **Administración**: añadir, editar y eliminar videojuegos con formularios y sentencias preparadas. Impedir duplicados de nombre y plataforma. No eliminar físicamente productos con líneas de pedido asociadas; mostrar un error explicativo.
8. **Preferencias**: guardar el tema claro u oscuro durante siete días mediante una cookie y aplicarlo en todas las páginas.
9. **Pruebas**: comprobar formularios inválidos, accesos no autorizados, IDs inexistentes, stock insuficiente, carrito vacío, correos repetidos y pedidos completados.

## Requisitos obligatorios
- No escribir consultas SQL en páginas públicas ni de administración; usar `includes/funciones_bd.php`.
- Usar `includes/funciones.php` para validaciones, cálculo de importes y control de acceso reutilizable.
- Usar `includes/header.php` y `includes/footer.php` en todas las páginas que muestran HTML.
- Utilizar `require_once`, `GET` para consultas y `POST` para cambios de estado.
- Emplear sentencias preparadas para los datos recibidos; validar todas las entradas en PHP.
- Escapar con `htmlspecialchars()` los textos procedentes de usuarios o de la base de datos al mostrarlos en HTML.
- Comprobar los permisos en el servidor, no solo ocultar enlaces.
- Realizar redirecciones y escribir cookies antes de incluir la cabecera HTML.
- No confiar en precios ni roles enviados por formularios.
- Las operaciones de escritura deben evitar ejecuciones duplicadas al refrescar (patrón POST-Redirect-GET).
- Añadir protección CSRF a los formularios que cambian datos, usando un token almacenado en sesión.

## Base de datos
Importar `gameworld.sql` desde phpMyAdmin. La importación elimina las tablas anteriores de la base de datos `gameworld`: **no ejecutarla sobre datos que se quieran conservar**. Las tablas son `usuarios`, `videojuegos`, `pedidos` y `detalle_pedido`.

Para obtener un administrador, primero registrar un usuario desde la web y después ejecutar en phpMyAdmin:

```sql
UPDATE usuarios SET rol = 'admin' WHERE email = 'correo@ejemplo.com';
```

## Entrega
- Carpeta del proyecto GameWorld con todos los archivos PHP completos.
- Archivo SQL de la base de datos.
- Breve documento de pruebas realizadas, con resultados y capturas.

## Nota sobre el código entregado
Los archivos PHP proporcionados contienen estructura funcional y bloques `TODO`. Los archivos `includes/funciones.php` y `includes/funciones_bd.php` **no se entregan**: deben crearse desde cero. El código inicial no constituye una solución terminada.
