<?php

/* STARTING SESSION */
require_once "../../core/session.php";

/* GETTING DB */
require_once "../../core/db.php";

/* GETTING THE USER INFO FROM THE FORM */
$email = $_POST['email'];
$password = $_POST['password'];

/* CHECK IF FIELDS ARE EMPTY */
if (empty($email) || empty($password)) {
    header("Location: ../../public/index.php?page=login&message=emptyFields");
    exit;
}

/* EXECUTING QUERY */
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

/* VERIFY IF USER EXISTS */
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    /* VERIFY PASSWORD */
    if (password_verify($password, $user['password'])) {

        /* SAVE USER INFO IN THE SESSION */
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];

        /* REMEMBER ME */
        if (isset($_POST['remember_me']) && $_POST['remember_me'] == 1) {
            /* GENERATE SAFE TOKEN */
            $token = bin2hex(random_bytes(32));

            /* SAVE THE TOKEN IN THE DATA BASE */
            $stmt = $conn->prepare("INSERT INTO user_tokens (user_id, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 DAY))");
            $stmt->execute([$user['id'], $token]);

            /* CREATE COOKIE WITH 30 DAYS EXPIRATION */
            setcookie('remember_token', $token, time() + (86400 * 30), "/", "", false, true);
        }

        /* REDIRECT TO HOME */
        header("Location: ../../public/index.php?page=home");
        exit;
    } else {
        header("Location: ../../public/index.php?page=login&message=wrongPassword");
        exit;
    }
} else {
    header("Location: ../../public/index.php?page=login&message=userNotFound");
    exit;
}
