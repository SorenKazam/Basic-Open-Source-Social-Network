<?php
echo "session.php was accessed";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
