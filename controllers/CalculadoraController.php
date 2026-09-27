<?php
class CalculadoraController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        try {
            $stmtInsumos = $this->pdo->query("SELECT nombre, cantidad, unidad FROM inventario ORDER BY nombre ASC");
            $insumosDisponibles = $stmtInsumos->fetchAll();
            $stmtRecetas = $this->pdo->query("SELECT nombre, insumos FROM recetas ORDER BY nombre ASC");
            $recetasDisponibles = $stmtRecetas->fetchAll();
        } catch (Exception $e) {
            $insumosDisponibles = [];
            $recetasDisponibles = [];
        }

        $seccion = 'calculadora';
        $titulo  = 'Calculadora';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/calculadora/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
