<?php

require_once __DIR__ . '/../../core/auth.php';
require_once __DIR__ . '/../../core/db.php';

/* VERIFY IS THERE IS ANY ID IN THE URL */
if (isset($_GET['id'])) {
    /* CONVERTING THE VALUE IN THE URL AS A INT */
    $profileId = intval($_GET['id']);
    /* CHECKING IF THE ID IS THE SESSION'S USER ID */
    // if the id in the url is the same as the id in the session, then the $isOwnProfile variable will recive true
    $isOwnProfile = ($profileId === $_SESSION['user_id']);
} else {
    /* If there isn't any id in the url, then we are seeing the session user profile */
    $profileId = $_SESSION['user_id'];
    $isOwnProfile = true;
}

/* GETTING THE USER DATA FROM THE DATABASE */
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $profileId);
$stmt->execute();
$result = $stmt->get_result();

/* WORKING WITH THE RESULTS */
if ($result->num_rows === 0) {
    /* that user wasnt found */
    $user = null;
} else {
    /* getting the user data */
    $user = $result->fetch_assoc();
}

/* VERIFY IF SESSION USER IS FOLLOWING THE PROFILE USER */
$isFollowing = false; // default value

$sqlCheckFollowing = "SELECT * FROM followers WHERE follower_id = ? AND following_id = ?";
$stmtCheckFollowing = $conn->prepare($sqlCheckFollowing);
$stmtCheckFollowing->bind_param("ii", $_SESSION['user_id'], $profileId);
$stmtCheckFollowing->execute();
$resultCheckFollowing = $stmtCheckFollowing->get_result();

if ($resultCheckFollowing->num_rows > 0) {
    $isFollowing = true; // if the user is following the profile user
}
