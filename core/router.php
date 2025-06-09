<?php

/* defining the page */
$route = $_GET['page'] ?? 'login';

/* IF USER IS NOT LOGGED IN REDIRECT TO THE LOGIN/REGISTER PAGE */
if (!isset($_SESSION['user_id']) && !in_array($route, ['login', 'register'])) {
    header('Location: index.php?page=login');
    exit;
}

/* IF USER IS LOGGED IN PREVENT FROM GETTING BACK TO LOGIN/REGISTER */
if (isset($_SESSION['user_id']) && in_array($route, ['login', 'register'])) {
    header('Location: index.php?page=home');
    exit;
}

switch ($route) {
    case 'home':
        $pageTitle = "Home";
        include "../templates/home.php";
        break;
    case 'login':
        $pageTitle = "Login";
        include "../templates/login.php";
        break;
    case 'register':
        $pageTitle = "Register";
        include "../templates/register.php";
        break;

    // in case page not found
    default:
        $pageTitle = "404";
        include "../templates/error404.php";
        break;
}
