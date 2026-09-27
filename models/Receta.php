<?php
class Receta {
    protected static function db() {
        static $pdo = null;
        if ($pdo === null) {
            require_once __DIR__ . '/../config/database.php';
        }
        return $GLOBALS['pdo'];
    }

    public static function todas() {
        $stmt = self::db()->query("SELECT * FROM recetas ORDER BY nombre ASC");
        return $stmt->fetchAll();
    }

    public static function total() {
        return self::db()->query("SELECT COUNT(*) FROM recetas")->fetchColumn();
    }

    public static function categoriasUnicas() {
        $stmt = self::db()->query("SELECT DISTINCT categoria FROM recetas ORDER BY categoria ASC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function costoPromedio() {
        $stmt = self::db()->query("SELECT AVG(CAST(REPLACE(REPLACE(rendimiento, '$', ''), ',', '') AS DECIMAL(10,2))) FROM recetas");
        $result = $stmt->fetchColumn();
        return $result ? floatval($result) : 0;
    }

    public static function guardar($datos) {
        $sql = "INSERT INTO recetas (nombre, categoria, insumos, rendimiento) VALUES (?, ?, ?, ?)";
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([$datos['nombre'], $datos['categoria'], $datos['insumos'], $datos['rendimiento']]);
    }

    public static function actualizar($id, $datos) {
        $sql = "UPDATE recetas SET nombre=?, categoria=?, insumos=?, rendimiento=? WHERE id_receta=?";
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([$datos['nombre'], $datos['categoria'], $datos['insumos'], $datos['rendimiento'], $id]);
    }

    public static function eliminar($id) {
        $stmt = self::db()->prepare("DELETE FROM recetas WHERE id_receta = ?");
        return $stmt->execute([$id]);
    }
}
