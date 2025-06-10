<?php

/* IMPORTING DB STUFF */
require_once __DIR__ . '/../../core/auth.php';
require_once __DIR__ . '/../../core/db.php';

/* GETTING SESSION USER AND TARGET USERS ID */
$sessionUser = $_SESSION['user_id'];
$targetUser = $_POST['targetUser'] ?? null;

/* CHECK IF WE HAVE TARGET USER ID */
if (!$targetUser) {
    header("Location: ../../public/index.php?page=profile&message=MissingTarget");
    exit;
}

/* DELETE RELATIONSHIP */
$sqlDelete = "DELETE FROM followers WHERE follower_id = ? AND following_id = ?";
$stmtDelete = $conn->prepare($sqlDelete);
$stmtDelete->bind_param("ii", $sessionUser, $targetUser);

if ($stmtDelete->execute()) {
    header("Location: ../../public/index.php?page=profile&id=$targetUser&message=UnfollowSuccess");
    exit;
} else {
    header("Location: ../../public/index.php?page=profile&id=$targetUser&message=UnfollowSuccess");
    exit;
}
