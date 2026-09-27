<?php
class RecetaController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $listaRecetas    = Receta::todas();
        $costoPromedio   = Receta::costoPromedio();
        $categoriasUnicas = Receta::categoriasUnicas();

        $seccion = 'receta';
        $titulo  = 'Recetas';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/recetas/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
