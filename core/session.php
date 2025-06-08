<?php

/* OPEN SESSION */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* TO DO: (COOCKIES) */

/* 
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    $stmt = $conn->prepare("SELECT user_id FROM user_tokens WHERE token = ? AND expires_at > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Login automático
        $_SESSION['user_id'] = $user['user_id'];
    }
}

*/