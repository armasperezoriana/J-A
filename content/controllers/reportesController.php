<?php

use content\component\componentViews as componentViews;
$components = new componentViews();
$views = _VIEWS_.$url."/".$url.".php";
$_SESSION['ventana'] = "Reportes";
require_once $views;
?>