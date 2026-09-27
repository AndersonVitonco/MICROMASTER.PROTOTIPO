<?php
class InventarioController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $listaInsumos = Insumo::todos();

        $disponibles = 0;
        $stockBajo   = 0;
        $agotados    = 0;
        $valorTotalInventario = 0;
        foreach ($listaInsumos as $insumo) {
            $cant = floatval($insumo['cantidad']);
            $valorTotalInventario += $cant * 0.85;
            if ($cant == 0) {
                $agotados++;
            } elseif ($cant < 20) {
                $stockBajo++;
            } else {
                $disponibles++;
            }
        }
        $totalInsumos = count($listaInsumos);

        $seccion = 'inventario';
        $titulo  = 'Inventario';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/inventario/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
