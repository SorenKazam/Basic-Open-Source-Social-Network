<?php
if (!isset($_GET['q']) || trim($_GET['q']) === '') {
    echo "<p>Por favor insere algo para pesquisar.</p>";
    return;
}

$q = trim($_GET['q']);
require_once BASE_PATH . '/core/db.php';

$stmt = $conn->prepare("SELECT username FROM users WHERE username LIKE ?");
$stmt->bind_param("s", $param);
$param = "%$q%";
$stmt->execute();

$result = $stmt->get_result();
$results = [];

while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

if (count($results) === 0) {
    echo "<p>Nenhum utilizador encontrado.</p>";
} else {
    echo "<ul>";
    foreach ($results as $user) {
        echo "<li>" . htmlspecialchars($user['username']) . "</li>";
    }
    echo "</ul>";
}
