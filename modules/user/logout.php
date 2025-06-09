<?php

session_start();

/* CLEAN EVERY SESSION VARIABLE */
$_SESSION = [];

/* DESTROY SESSION */
session_destroy();

/* CLEAN REMEMBER ME COOKIES */
if (isset($_COOKIE['remember_token'])) {
    // Definir o cookie com tempo no passado para "apagar"
    setcookie('remember_token', '', time() - 3600, '/');

    // (Opcional) Se quiser, apagar o token do banco de dados também
    // Requer conexão ao banco e saber o token atual
    // Exemplo:
    // $stmt = $conn->prepare("DELETE FROM user_tokens WHERE token = ?");
    // $stmt->execute([$_COOKIE['remember_token']]);
}

/* REDIRECT USER TO THE LOGIN PAGE */
header("Location: ../../public/index.php?page=login");
exit;
