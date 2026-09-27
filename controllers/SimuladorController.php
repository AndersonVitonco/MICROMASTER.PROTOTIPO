<?php
class SimuladorController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        try {
            $stmtRecetas = $this->pdo->query("SELECT nombre, rendimiento FROM recetas ORDER BY nombre ASC");
            $recetasDisponibles = $stmtRecetas->fetchAll();
        } catch (Exception $e) {
            $recetasDisponibles = [];
        }

        $seccion = 'simulador';
        $titulo  = 'Simulador';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/simulador/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
