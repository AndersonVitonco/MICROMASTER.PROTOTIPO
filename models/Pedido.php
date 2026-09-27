<?php
class Pedido {
    protected static function db() {
        static $pdo = null;
        if ($pdo === null) {
            require_once __DIR__ . '/../config/database.php';
        }
        return $GLOBALS['pdo'];
    }

    public static function todos() {
        $stmt = self::db()->query("SELECT * FROM pedidos ORDER BY id_pedido DESC");
        return $stmt->fetchAll();
    }

    public static function total() {
        return self::db()->query("SELECT COUNT(*) FROM pedidos")->fetchColumn();
    }

    public static function pendientes() {
        return self::db()->query("SELECT COUNT(*) FROM pedidos WHERE estado = 'Pendiente'")->fetchColumn();
    }

    public static function enTransito() {
        return self::db()->query("SELECT COUNT(*) FROM pedidos WHERE estado = 'En tránsito'")->fetchColumn();
    }

    public static function entregados() {
        return self::db()->query("SELECT COUNT(*) FROM pedidos WHERE estado = 'Entregado'")->fetchColumn();
    }

    public static function ventasTotales() {
        $stmt = self::db()->query("SELECT SUM(CAST(REPLACE(REPLACE(total, '$', ''), ',', '') AS DECIMAL(10,2))) FROM pedidos WHERE estado = 'Entregado'");
        $result = $stmt->fetchColumn();
        return $result ? floatval($result) : 0;
    }

    public static function guardar($datos) {
        $sql = "INSERT INTO pedidos (codigo_envio, destino, conductor, ruta, estado, eta, total) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([$datos['codigo_envio'], $datos['destino'], $datos['conductor'], $datos['ruta'], $datos['estado'], $datos['eta'], $datos['total']]);
    }

    public static function actualizar($id, $datos) {
        $sql = "UPDATE pedidos SET destino=?, conductor=?, ruta=?, estado=?, eta=?, total=? WHERE id_pedido=?";
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([$datos['destino'], $datos['conductor'], $datos['ruta'], $datos['estado'], $datos['eta'], $datos['total'], $id]);
    }

    public static function eliminar($id) {
        $stmt = self::db()->prepare("DELETE FROM pedidos WHERE id_pedido = ?");
        return $stmt->execute([$id]);
    }
}
