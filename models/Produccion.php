<?php
class Produccion {
    protected static function db() {
        static $pdo = null;
        if ($pdo === null) {
            require_once __DIR__ . '/../config/database.php';
        }
        return $GLOBALS['pdo'];
    }

    public static function todos() {
        $stmt = self::db()->query("SELECT * FROM produccion ORDER BY id_lote ASC");
        return $stmt->fetchAll();
    }

    public static function enProceso() {
        $stmt = self::db()->query("SELECT * FROM produccion WHERE estado IN ('En proceso', 'Completado') ORDER BY id_lote ASC");
        return $stmt->fetchAll();
    }

    public static function planificados() {
        $stmt = self::db()->query("SELECT * FROM produccion WHERE estado NOT IN ('En proceso', 'Completado') ORDER BY id_lote ASC");
        return $stmt->fetchAll();
    }
}
