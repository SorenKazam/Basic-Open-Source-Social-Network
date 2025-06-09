<?php

/* STARTING SESSION */
require_once "../../core/session.php";

/* GETTING DB */
require_once "../../core/db.php";

/* GETTING INFO FROM THE REGISTER FORM */
$frm_name = $_POST['name'];
$frm_username = $_POST['username'];
$frm_email = $_POST['email'];
$frm_password = $_POST['password'];
$frm_confirm_password = $_POST['confirm_password'];

/* VERIFY IF THE FIELDS ARE FILLED */
if (empty($frm_name) || empty($frm_username) || empty($frm_email) || empty($frm_password) || empty($frm_confirm_password)) {
    header("Location: ../../public/index.php?page=register&message=emptyFields");
    exit;
}

/* VERIFY IF THE PASSWORDS MATCH */
if ($frm_password != $frm_confirm_password) {
    header("Location: ../../public/index.php?page=register&message=pswdDontMatch");
    exit;
}

/* verify if username or email is already in use in db */
$sql = "SELECT id FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $frm_username, $frm_email);
$stmt->execute();
$stmt->store_result();

/* IF THERE IS ANY USER WITH THE SAME USERNAME OR EMAIL */
if ($stmt->num_rows > 0) {
    header("Location: ../../public/index.php?page=register&message=userExists");
    exit;
}

/* HASH PASSWORD */
$hashed_password = password_hash($frm_password, PASSWORD_DEFAULT);

/* INSERTING NEW USER INTO DB */
$sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $frm_name, $frm_username, $frm_email, $hashed_password);

/* REDIRECT TO LOGIN PAGE */
if ($stmt->execute()) {
    /* IF REGISTRATION SUCCESSFUL */
    header("Location: ../../public/index.php?page=login&message=registerSuccess");
    exit;
} else {
    /* IF THERE IS ANY PROBLEM WITH REGISTRATION */
    header("Location: ../../public/index.php?page=register&message=registerFail");
    exit;
}
