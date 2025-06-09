<?php

/* ENTRY POINT */

/* THIS GLOBAL VARIABLE IS GOLD! */
/* 
INSTEAD OF DOING: require_once __DIR__ . '/../../core/db.php';
I CAN JUST DO: require_once BASE_PATH . '/core/db.php';
*/
define('BASE_PATH', dirname(__DIR__));
require_once "../core/session.php";
require_once "../core/config.php";
require_once "../core/router.php";
