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

        /* REDIRECT TO HOME */
        header("Location: ../../public/index.php?page=home");
        exit;
    } else {

        /* IS PASSWORD IS WRONG */
        header("Location: ../../public/index.php?page=login&message=wrongPassword");
        exit;
    }
} else {

    /* IF THERE IS NO USER WITH THIS EMAIL */
    header("Location: ../../public/index.php?page=login&message=userNotFound");
    exit;
}
