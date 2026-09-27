<?php
class AcercaController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $seccion = 'acerca';
        $titulo  = 'Acerca de';

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/sidebar.php';
        require_once 'views/acerca/index.php';
        require_once 'views/layouts/modales.php';
        require_once 'views/layouts/app_footer.php';
    }
}
