<?php
class ReporteController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        try {
            $stmtTotalInsumos = $this->pdo->query("SELECT COUNT(*) FROM inventario");
            $totalInsumosReporte = $stmtTotalInsumos->fetchColumn() ?: 0;
            $stmtTotalEnvios = $this->pdo->query("SELECT COUNT(*) FROM pedidos");
            $totalEnviosReporte = $stmtTotalEnvios->fetchColumn() ?: 0;
            $stmtVentas = $this->pdo->query("SELECT SUM(CAST(REPLACE(REPLACE(total, '$', ''), ',', '') AS DECIMAL(10,2))) FROM pedidos WHERE estado = 'Entregado'");
            $ventasTotales = $stmtVentas->fetchColumn() ?: 0;
        } catch (Exception $e) {
            $totalInsumosReporte = 0;
            $totalEnviosReporte = 0;
            $ventasTotales = 0;
        }

        $estilos_extra = '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        $seccion = 'reporte';
        $titulo  = 'Reportes';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/reportes/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
