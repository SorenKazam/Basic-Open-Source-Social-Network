<?php

/* CATCHING ERROR MESSAGES FROM THE URL */
if (isset($_GET['error'])) {
    $errorMsg = $_GET['error'];

    switch ($errorMsg) {
        case 'pswdDontMatch':
            $errorMsg = 'Passwords do not match';
            break;

        default:
            $errorMsg = 'Unknow error';
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

    <!-- FOR THE ERROR MESSAGES -->
    <?php if (isset($_GET['error'])): ?>
        <div class="container">
            <div class="alertBox">
                <?php echo "⚠️" . $errorMsg; ?>
            </div>
        </div>
    <?php endif; ?>