<?php
require_once './configs/bootstrap.php';
require_once './templates/layouts/html.layout.php';
ob_start();

if (isset($_GET["page"])) {
    fromInc($_GET["page"]);
} else {
    fromInc("accueil");
}

?>