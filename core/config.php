<?php
/* setting up db information */
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "basic_open_source_social_network";

/* connecting to the db */
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

/* verify if there is any error while connecting */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
