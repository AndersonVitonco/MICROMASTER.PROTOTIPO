<?php
class LandingController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $seccion = 'landing';
        $titulo  = 'MicroMaster';

        require_once 'views/layouts/header.php';
        require_once 'views/landing/index.php';?>
<script src="assets/js/main.js"></script>
</body>
</html><?php
    }
    }
}
