<?php

/* STARTING SESSION */
require_once __DIR__ . "/../../../core/session.php";

/* INCLUDING DATABASE */
require_once __DIR__ . "/../../../core/db.php";

/* SAVING SESSION USER ID IN A VARIABLE */
$userId = $_SESSION['user_id'];

/* GETTING THE NEW USER INFO FROM FORM and removing the extra space from the start and end */
$name = trim($_POST['name']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

echo $name . $username . $email . $password;

/* VARIABLES TO CREATE A DYNAMIC QUERY */
$fields = [];
$types = '';
$values = [];

/* VERIFY WHAT FIELDS WHERE FIELDS, doing it for each field */

/* NAME */
if (!empty($name)) {
    $fields[] = "name = ?";
    $types .= "s";
    $values[] = $name;
}

/* USERNAME */
if (!empty($username)) {
    $fields[] = "username = ?";
    $types .= "s";
    $values[] = $username;
}

/* EMAIL */
if (!empty($email)) {
    $fields[] = "email = ?";
    $types .= "s";
    $values[] = $email;
}

/* PASSWORD */
if (!empty($password)) {
    $fields[] = "password = ?";
    $types .= "s";
    $values[] = password_hash($password, PASSWORD_DEFAULT); // hashing the password!
}

/* IF NO FIELDS WHERE FILL */
if (empty($fields)) {
    header("Location: ../../../public/index.php?page=profile&message=noprofilechanges");
    exit;
}

// BUILD A DYNAMIC QUERY: ex: "UPDATE users SET name = ?, email = ? WHERE id = ?"
$sql = "UPDATE users SET " . implode(", ", $fields) . " WHERE id = ?";

/* ADDING THE SESSION ID TO THE VALUES */
$types .= "i";
$values[] = $userId;

/* PREPARE THE QUERY TO AVOID SQL INJECTION */
$stmt = mysqli_prepare($conn, $sql);

/* IF THERE IS ANY PROBLEM WITH THE PREPARED STATEMENT */
if ($stmt === false) {
    header("Location: ../../../public/index.php?page=profile&message=queryerror");
    exit;
}

/* BINDING THE VALUES TO THE PREPARED STATEMENT */
mysqli_stmt_bind_param($stmt, $types, ...$values);

/* EXECUTE THE QUERY */
if (mysqli_stmt_execute($stmt)) {
    header("Location: ../../../public/index.php?page=profile&message=profileupdated");
    exit;
} else {
    header("Location: ../../../public/index.php?page=profile&message=errorupdatingprofile");
    exit;
}

/* FREEING THE STATEMENT */
mysqli_stmt_close($stmt);
