<?php

require_once __DIR__ . "/../../core/session.php";
require_once __DIR__ . "/../../core/db.php";

echo "Follow process";

/* VERIFY THAT TARGET USER ID IS VALID */
if (!isset($_POST['targetUser']) || !is_numeric($_POST['targetUser'])) {
    header("Location: ../../public/index.php?page=profile&message=InvalidTargetUser");
    exit;
}

$sessionUser = $_SESSION['user_id'];
$targetUser = $_POST['targetUser'];

/* AVOID FOLLOWING YOURSELF */
if ($sessionUser == $targetUser) {
    header("Location: ../../public/index.php?page=profile&id=$targetUser&message=CannotFollowSelf");
    exit;
}

/* VERIFY IF THE USER ALREADY FOLLOWED */
$sqlCheck = "SELECT * FROM followers WHERE follower_id = ? AND following_id = ?";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bind_param("ii", $sessionUser, $targetUser);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows > 0) {
    header("Location: ../../public/index.php?page=profile&id=$targetUser&message=AlreadyFollowing");
    exit;
}

/* CREATE RELATIONSHIP */
$sqlInsert = "INSERT INTO followers (follower_id, following_id) VALUES (?, ?)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bind_param("ii", $sessionUser, $targetUser);

/* REDIRECT TO USERS PAGE */
if ($stmt->execute()) {
    /* IF FOLLOW WAS SUCCESS */
    header("Location: ../../public/index.php?page=profile&id=" . $targetUser . "&message=FollowSuccess");
    exit;
} else {
    /* IF THERE IS ANY PROBLEM WITH FOLLOWING */
    header("Location: ../../public/index.php?page=profile&id=" . $targetUser . "&message=FollowError");
    exit;
}
