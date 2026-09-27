<?php
class Insumo {
    protected static function db() {
        static $pdo = null;
        if ($pdo === null) {
            require_once __DIR__ . '/../config/database.php';
        }
        return $GLOBALS['pdo'];
    }

    public static function todos() {
        $stmt = self::db()->query("SELECT * FROM inventario ORDER BY nombre ASC");
        return $stmt->fetchAll();
    }

    public static function total() {
        return self::db()->query("SELECT COUNT(*) FROM inventario")->fetchColumn();
    }

    public static function criticos() {
        $stmt = self::db()->query("SELECT * FROM inventario WHERE cantidad < 20 ORDER BY cantidad ASC");
        return $stmt->fetchAll();
    }

    public static function porId($id) {
        $stmt = self::db()->prepare("SELECT * FROM inventario WHERE id_insumo = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function guardar($datos) {
        $sql = "INSERT INTO inventario (nombre, categoria, cantidad, unidad) VALUES (?, ?, ?, ?)";
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([$datos['nombre'], $datos['categoria'], $datos['cantidad'], $datos['unidad']]);
    }

    public static function actualizar($id, $datos) {
        $sql = "UPDATE inventario SET nombre=?, categoria=?, cantidad=?, unidad=? WHERE id_insumo=?";
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([$datos['nombre'], $datos['categoria'], $datos['cantidad'], $datos['unidad'], $id]);
    }

    public static function eliminar($id) {
        $stmt = self::db()->prepare("DELETE FROM inventario WHERE id_insumo = ?");
        return $stmt->execute([$id]);
    }
}
