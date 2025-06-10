<?php

/* START SESSION */
include_once "../core/session.php";

/* CATCHING ERROR MESSAGES FROM THE URL */
if (isset($_GET['message'])) {
    $urlMsg = $_GET['message'];

    switch ($urlMsg) {
        case 'pswdDontMatch':
            $urlMsg = 'Passwords do not match';
            $messageEmoji = '❌';
            break;
        case 'emptyFields':
            $urlMsg = 'Please fill in all fields';
            $messageEmoji = '⚠️';
            break;
        case 'userExists':
            $urlMsg = 'User already exists';
            $messageEmoji = '⚠️';
            break;
        case 'registerSuccess':
            /* TO DO: THIS SHOULD BE GREEN! */
            $urlMsg = 'Registration successful';
            $messageType = 'success';
            $messageEmoji = '✅';
            break;
        case 'registerFail':
            $urlMsg = 'Registration failed';
            $messageEmoji = '⚠️';
            break;
        case 'wrongPassword':
            $urlMsg = 'Wrong password';
            $messageEmoji = '⚠️';
            break;
        case 'userNotFound':
            $urlMsg = 'User not found';
            $messageEmoji = '❌';
            break;
        case 'FollowSuccess':
            $urlMsg = 'Followed successfully!';
            $messageType = 'success';
            $messageEmoji = '✅';
            break;
        case 'UnfollowSuccess':
            $urlMsg = 'unFollowed successfully!';
            $messageType = 'success';
            $messageEmoji = '✅';
            break;
        case 'FollowError':
            $urlMsg = 'Failed to follow';
            $messageEmoji = '⚠️';
            break;
        default:
            $urlMsg = 'Unknow error';
            $messageEmoji = '⚠️';
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
    <!-- GOOGLE MATERIAL ICONS CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- PAGE TITLE -->
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include_once __DIR__ . "/navbar.php"; ?>
    <!-- FOR THE ERROR MESSAGES -->
    <?php if (isset($_GET['message'])): ?>
        <div class="container">
            <div class="alertBox <?php echo $messageType; ?>">
                <?php echo $messageEmoji . $urlMsg; ?>
            </div>
        </div>
    <?php endif; ?>