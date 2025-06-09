<?php require_once BASE_PATH . '/components/header.php'; ?>
<!-- USER'S PROFILE PAGE -->
<div class="container">

    <!-- GETTING THE PROFILE ENGINE RUNNING -->
    <?php require_once BASE_PATH . '/modules/user/profile_process.php'; ?>

    <!-- IF USER NOT FOUND -->
    <?php if (is_null($user)): ?>
        <p>Utilizador não encontrado.</p>
    <?php else: ?>
        <h2>Perfil de <?= htmlspecialchars($user['username']) ?></h2>
        <p>Bio: <?= htmlspecialchars($user['bio'] ?? 'Este utilizador ainda não escreveu uma bio.') ?></p>
        <p>Membro desde: <?= date('d/m/Y', strtotime($user['created_at'])) ?></p>

        <?php if ($isOwnProfile): ?>
            <a href="?page=settings">Editar Perfil</a>
        <?php else: ?>
            <button>Adicionar Amigo</button>
            <button>Bloquear</button>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php require_once BASE_PATH . '/components/footer.php'; ?>