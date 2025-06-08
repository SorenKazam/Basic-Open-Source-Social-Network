<?php

require_once __DIR__ . 'config.php';

/* connecting to the db */
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

/* verify if there is any error while connecting */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
