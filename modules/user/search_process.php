<?php

/* DATABSE CONFIG */
require_once __DIR__ . "/../../core/db.php";

/* CHECKS IF THERE IS ANY QUERY TERM */
if (!isset($_GET['query']) || trim($_GET['query']) === '') {
    echo "<p>Please fill the search input.</p>";
    return;
}

/* SAVES THE QUERY TERM */
$query = trim($_GET['query']);

/* GO TO THE DATABSE LOOKING FOR THE USER WITH THAT USERNAME */
$stmt = $conn->prepare("SELECT username FROM users WHERE username LIKE ?");
$stmt->execute(["%$query%"]);

/* TO DO: I CAN'T USE FETCHALL() */
/* $results = $stmt->fetchAll(); */

/* RESULTS */
if (count($results) === 0) {
    echo "<p>Nenhum utilizador encontrado.</p>";
} else {
    echo "<ul>";
    foreach ($results as $user) {
        echo "<li>" . htmlspecialchars($user['username']) . "</li>";
    }
    echo "</ul>";
}
