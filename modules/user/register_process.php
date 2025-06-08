<?php

echo "Chegou no register_process.php";
require_once __DIR__ . "/../../core/session.php";

$frm_name = $_POST['name'];
$frm_username = $_POST['username'];
$frm_email = $_POST['email'];
$frm_password = $_POST['password'];
$frm_confirm_password = $_POST['confirm_password'];

echo $frm_name . $frm_username . $frm_email . $frm_password . $frm_confirm_password;

if ($frm_password != $frm_confirm_password) {
    header("Location: ../../public/index.php?page=register&error=pswdDontMatch");
    exit;
} else {
    echo "Passwords match!";
}
