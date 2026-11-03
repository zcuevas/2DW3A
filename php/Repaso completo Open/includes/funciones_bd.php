<?php
// Todas las consultas SQL de la aplicación están en este archivo.

// Devuelve todos los videojuegos (para administración).
function obtenerVideojuegos($conexion)
{
    $sql = "SELECT id, nombre, genero, plataforma, precio, stock
            FROM videojuegos
            ORDER BY nombre ASC";
    $resultado = $conexion->query($sql);
    $videojuegos = [];

    while ($fila = $resultado->fetch_assoc()) {
        $videojuegos[] = $fila;
    }

    return $videojuegos;
}

// Busca videojuegos con búsqueda, plataforma, orden y paginación.
function buscarVideojuegos($conexion, $busqueda, $plataforma, $orden, $limite, $desplazamiento)
{
    $sql = "SELECT id, nombre, genero, plataforma, precio, stock
            FROM videojuegos
            WHERE 1 = 1";
    $tipos = '';
    $parametros = [];

    if ($busqueda !== '') {
        $sql .= " AND nombre LIKE ?";
        $tipos .= 's';
        $parametros[] = '%' . $busqueda . '%';
    }

    if ($plataforma !== '') {
        $sql .= " AND plataforma = ?";
        $tipos .= 's';
        $parametros[] = $plataforma;
    }

    $ordenes = [
        'nombre' => 'nombre ASC',
        'precio_asc' => 'precio ASC',
        'precio_desc' => 'precio DESC'
    ];

    if (!isset($ordenes[$orden])) {
        $orden = 'nombre';
    }

    $sql .= " ORDER BY " . $ordenes[$orden];
    $sql .= " LIMIT ? OFFSET ?";
    $tipos .= 'ii';
    $parametros[] = $limite;
    $parametros[] = $desplazamiento;

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param($tipos, ...$parametros);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $videojuegos = [];

    while ($fila = $resultado->fetch_assoc()) {
        $videojuegos[] = $fila;
    }

    $stmt->close();

    return $videojuegos;
}

// Cuenta los videojuegos que cumplen los filtros.
function contarVideojuegos($conexion, $busqueda, $plataforma)
{
    $sql = "SELECT COUNT(*) AS total
            FROM videojuegos
            WHERE 1 = 1";
    $tipos = '';
    $parametros = [];

    if ($busqueda !== '') {
        $sql .= " AND nombre LIKE ?";
        $tipos .= 's';
        $parametros[] = '%' . $busqueda . '%';
    }

    if ($plataforma !== '') {
        $sql .= " AND plataforma = ?";
        $tipos .= 's';
        $parametros[] = $plataforma;
    }

    $stmt = $conexion->prepare($sql);

    if ($tipos !== '') {
        $stmt->bind_param($tipos, ...$parametros);
    }

    $stmt->execute();
    $fila = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return (int)$fila['total'];
}

// Devuelve un videojuego por su identificador.
function obtenerVideojuegoPorId($conexion, $id)
{
    $stmt = $conexion->prepare("SELECT id, nombre, genero, plataforma, precio, stock
                                FROM videojuegos
                                WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $juego = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return $juego;
}

// Busca un usuario por su correo electrónico.
function obtenerUsuarioPorEmail($conexion, $email)
{
    $stmt = $conexion->prepare("SELECT id, nombre, email, password, rol
                                FROM usuarios
                                WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $usuario = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return $usuario;
}

// Comprueba si un correo ya está registrado.
function existeEmail($conexion, $email)
{
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $usuario = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return $usuario !== null;
}

// Inserta un cliente nuevo.
function insertarUsuario($conexion, $nombre, $email, $password)
{
    $rol = 'cliente';
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol)
                                VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $nombre, $email, $password, $rol);
    $correcto = $stmt->execute();
    $stmt->close();

    return $correcto;
}

// Comprueba si existe un videojuego con el mismo nombre y plataforma.
function existeVideojuegoDuplicado($conexion, $nombre, $plataforma, $idExcluir = 0)
{
    $stmt = $conexion->prepare("SELECT id
                                FROM videojuegos
                                WHERE nombre = ? AND plataforma = ? AND id <> ?");
    $stmt->bind_param('ssi', $nombre, $plataforma, $idExcluir);
    $stmt->execute();
    $juego = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return $juego !== null;
}

// Inserta un videojuego.
function insertarVideojuego($conexion, $nombre, $genero, $plataforma, $precio, $stock)
{
    $stmt = $conexion->prepare("INSERT INTO videojuegos (nombre, genero, plataforma, precio, stock)
                                VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssdi', $nombre, $genero, $plataforma, $precio, $stock);
    $correcto = $stmt->execute();
    $stmt->close();

    return $correcto;
}

// Actualiza un videojuego.
function actualizarVideojuego($conexion, $id, $nombre, $genero, $plataforma, $precio, $stock)
{
    $stmt = $conexion->prepare("UPDATE videojuegos
                                SET nombre = ?, genero = ?, plataforma = ?, precio = ?, stock = ?
                                WHERE id = ?");
    $stmt->bind_param('sssdii', $nombre, $genero, $plataforma, $precio, $stock, $id);
    $correcto = $stmt->execute();
    $stmt->close();

    return $correcto;
}

// Comprueba si un videojuego aparece en algún pedido.
function videojuegoTienePedidos($conexion, $id)
{
    $stmt = $conexion->prepare("SELECT id FROM detalle_pedido WHERE id_videojuego = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $linea = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return $linea !== null;
}

// Elimina un videojuego.
function eliminarVideojuego($conexion, $id)
{
    $stmt = $conexion->prepare("DELETE FROM videojuegos WHERE id = ?");
    $stmt->bind_param('i', $id);
    $correcto = $stmt->execute();
    $stmt->close();

    return $correcto;
}

// Registra un pedido completo. Devuelve un array con ok, mensaje e id.
function registrarPedido($conexion, $idUsuario, $carrito)
{
    if (empty($carrito)) {
        return ['ok' => false, 'mensaje' => 'El carrito está vacío.'];
    }

    $conexion->begin_transaction();

    try {
        $lineas = [];
        $total = 0;

        // Se consulta y se bloquea cada videojuego con FOR UPDATE.
        foreach ($carrito as $idVideojuego => $cantidad) {
            $idVideojuego = (int)$idVideojuego;
            $cantidad = (int)$cantidad;

            if ($idVideojuego <= 0 || $cantidad <= 0) {
                throw new Exception('Hay una cantidad no válida en el carrito.');
            }

            $stmt = $conexion->prepare("SELECT id, nombre, precio, stock
                                        FROM videojuegos
                                        WHERE id = ?
                                        FOR UPDATE");
            $stmt->bind_param('i', $idVideojuego);
            $stmt->execute();
            $juego = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            if (!$juego) {
                throw new Exception('Uno de los videojuegos ya no existe.');
            }

            if ((int)$juego['stock'] < $cantidad) {
                throw new Exception('No hay stock suficiente de ' . $juego['nombre'] . '.');
            }

            $precio = (float)$juego['precio'];
            $total += round($precio * $cantidad, 2);
            $lineas[] = [
                'id' => $idVideojuego,
                'cantidad' => $cantidad,
                'precio' => $precio
            ];
        }

        $total = round($total, 2);

        // Se guarda el pedido.
        $stmt = $conexion->prepare("INSERT INTO pedidos (id_usuario, total) VALUES (?, ?)");
        $stmt->bind_param('id', $idUsuario, $total);
        $stmt->execute();
        $idPedido = $conexion->insert_id;
        $stmt->close();

        // Se guardan las líneas del pedido.
        foreach ($lineas as $linea) {
            $stmt = $conexion->prepare("INSERT INTO detalle_pedido
                                        (id_pedido, id_videojuego, cantidad, precio_unitario)
                                        VALUES (?, ?, ?, ?)");
            $stmt->bind_param('iiid', $idPedido, $linea['id'], $linea['cantidad'], $linea['precio']);
            $stmt->execute();
            $stmt->close();
        }

        // Se descuenta el stock.
        foreach ($lineas as $linea) {
            $stmt = $conexion->prepare("UPDATE videojuegos
                                        SET stock = stock - ?
                                        WHERE id = ?");
            $stmt->bind_param('ii', $linea['cantidad'], $linea['id']);
            $stmt->execute();
            $stmt->close();
        }

        $conexion->commit();

        return [
            'ok' => true,
            'mensaje' => 'Pedido realizado correctamente.',
            'id' => $idPedido
        ];
    } catch (Exception $e) {
        $conexion->rollback();

        return ['ok' => false, 'mensaje' => $e->getMessage()];
    }
}

// Devuelve los pedidos de un usuario.
function obtenerPedidosUsuario($conexion, $idUsuario)
{
    $stmt = $conexion->prepare("SELECT id, fecha, total
                                FROM pedidos
                                WHERE id_usuario = ?
                                ORDER BY fecha DESC, id DESC");
    $stmt->bind_param('i', $idUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $pedidos = [];

    while ($fila = $resultado->fetch_assoc()) {
        $pedidos[] = $fila;
    }

    $stmt->close();

    return $pedidos;
}

// Devuelve las líneas de un pedido, comprobando que es del usuario.
function obtenerLineasPedido($conexion, $idPedido, $idUsuario)
{
    $stmt = $conexion->prepare("SELECT d.cantidad, d.precio_unitario, v.nombre
                                FROM detalle_pedido d
                                INNER JOIN videojuegos v ON v.id = d.id_videojuego
                                INNER JOIN pedidos p ON p.id = d.id_pedido
                                WHERE d.id_pedido = ? AND p.id_usuario = ?
                                ORDER BY d.id ASC");
    $stmt->bind_param('ii', $idPedido, $idUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $lineas = [];

    while ($fila = $resultado->fetch_assoc()) {
        $lineas[] = $fila;
    }

    $stmt->close();

    return $lineas;
}
