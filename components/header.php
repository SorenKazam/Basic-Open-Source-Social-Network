<?php

/* START SESSION */
include_once "../core/session.php";

/* CATCHING ERROR MESSAGES FROM THE URL */
if (isset($_GET['message'])) {
    $urlMsg = $_GET['message'];

    switch ($urlMsg) {
        case 'pswdDontMatch':
            $urlMsg = 'Passwords do not match';
            break;
        case 'emptyFields':
            $urlMsg = 'Please fill in all fields';
            break;
        case 'userExists':
            $urlMsg = 'User already exists';
            break;
        case 'registerSuccess':
            /* TO DO: THIS SHOULD BE GREEN! */
            $urlMsg = 'Registration successful';
            break;
        case 'registerFail':
            $urlMsg = 'Registration failed';
            break;
        case 'wrongPassword':
            $urlMsg = 'Wrong password';
            break;
        case 'userNotFound':
            $urlMsg = 'User not found';
            break;
        default:
            $urlMsg = 'Unknow error';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLES -->
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">
    <!-- PAGE TITLE -->
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include_once __DIR__ . "/navbar.php"; ?>
    <!-- FOR THE ERROR MESSAGES -->
    <?php if (isset($_GET['message'])): ?>
        <div class="container">
            <div class="alertBox">
                <?php echo "⚠️" . $urlMsg; ?>
            </div>
        </div>
    <?php endif; ?>