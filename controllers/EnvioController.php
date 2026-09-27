<?php
class EnvioController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $listaPedidos = Pedido::todos();

        $totalPedidos = count($listaPedidos);
        $enTransito = 0;
        $entregados = 0;
        $pendientes = 0;
        foreach ($listaPedidos as $p) {
            $est = $p['estado'];
            if ($est === 'En tránsito') {
                $enTransito++;
            } elseif ($est === 'Entregado') {
                $entregados++;
            } elseif ($est === 'Pendiente') {
                $pendientes++;
            }
        }

        $seccion = 'envio';
        $titulo  = 'Envíos';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/envios/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
