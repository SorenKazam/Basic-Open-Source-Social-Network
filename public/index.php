<?php

require_once "../core/config.php";
require_once "../core/router.php";

$route = $_GET['page'] ?? 'home';

switch ($route) {
    case 'home':
        include "../views/home.php";
        break;
}
