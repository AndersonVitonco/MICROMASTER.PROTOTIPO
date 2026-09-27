<?php
class DashboardController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $totalInsumos    = Insumo::total();
        $totalRecetas    = Receta::total();
        $totalPedidos    = Pedido::total();
        $pedidosPendientes = Pedido::pendientes();
        $enTransito      = Pedido::enTransito();
        $entregados      = Pedido::entregados();
        $ventas          = Pedido::ventasTotales();
        $insumosCriticos = Insumo::criticos();

        $stmt = $this->pdo->query("SELECT SUM(cantidad * COALESCE(precio, 0.85)) FROM inventario");
        $valorInventario = $stmt->fetchColumn() ?: 0;

        $lotesEnProceso = [
            ['producto' => 'Pan Francés', 'codigo_op' => 'OP-2026-001', 'categoria' => 'Panadería', 'horario_fecha' => '06:00 - 10:00', 'estado' => 'En proceso', 'progreso' => 65, 'cantidad' => '300 unidades', 'insumos_necesarios' => 'Harina 50kg, Sal 1kg, Levadura 500g'],
            ['producto' => 'Café Americano', 'codigo_op' => 'OP-2026-002', 'categoria' => 'Bebidas', 'horario_fecha' => '08:00 - 12:00', 'estado' => 'En proceso', 'progreso' => 40, 'cantidad' => '200 unidades', 'insumos_necesarios' => 'Café 3kg, Agua 50L'],
            ['producto' => 'Torta de Chocolate', 'codigo_op' => 'OP-2026-003', 'categoria' => 'Repostería', 'horario_fecha' => '10:00 - 14:00', 'estado' => 'Completado', 'progreso' => 100, 'cantidad' => '50 unidades', 'insumos_necesarios' => 'Harina 25kg, Azúcar 15kg, Huevos 200u, Chocolate 10kg'],
        ];

        $lotesPlanificados = [
            ['codigo_op' => 'OP-2026-004', 'producto' => 'Pollo Asado', 'categoria' => 'Platos', 'cantidad' => '80 unidades', 'insumos_necesarios' => 'Pollo 80kg, Sal 1kg, Aceite 4L', 'horario_fecha' => '2026-05-20 05:00', 'estado' => 'Pendiente aprobación'],
            ['codigo_op' => 'OP-2026-005', 'producto' => 'Pan Francés', 'categoria' => 'Panadería', 'cantidad' => '500 unidades', 'insumos_necesarios' => 'Harina 80kg, Sal 2kg, Levadura 1kg', 'horario_fecha' => '2026-05-21 06:00', 'estado' => 'Planificado'],
        ];

        $seccion = 'dashboard';
        $titulo  = 'Dashboard';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/dashboard/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
