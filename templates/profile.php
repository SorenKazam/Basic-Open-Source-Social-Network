<?php require_once BASE_PATH . '/components/header.php'; ?>

<!-- GETTING THE PROFILE ENGINE RUNNING -->
<?php require_once BASE_PATH . '/modules/user/profile_process.php'; ?>
<!-- USER'S PROFILE PAGE -->
<div class="container">

    <div class="box">
        <div class="box-title">
            <?php if (is_null($user)): ?>
                <!-- IF USER NOT FOUND -->
                <h1>User not found</h1>
            <?php else: ?>
                <!-- IF USER FOUND -->
                <h1><?= htmlspecialchars($user['username']); ?></h1>
                <!-- IF USER IS SESSION USER -->
                <?php if ($isOwnProfile): ?>
                    <a href="?page=settings">✏️ Edit profile</a>
                <?php else: ?>
                    <!-- IF USER IS ANOTHER USER -->
                    <?php if ($isFollowing): ?>
                        <form action="../modules/user/unfollow_process.php" method="post" class="formBasic">
                            <input type="hidden" name="targetUser" value="<?php echo htmlspecialchars($user['id']) ?>">
                            <button class="btn btn-danger" type="submit"><i class="material-icons">person_remove</i> unFollow</button>
                        </form>
                    <?php else: ?>
                        <form action="../modules/user/follow_process.php" method="post" class="formBasic">
                            <input type="hidden" name="targetUser" value="<?php echo htmlspecialchars($user['id']) ?>">
                            <button class="btn btn-primary" type="submit"><i class="material-icons">person_add</i> Follow</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>


            <?php endif; ?>
        </div>
        <div class="box-content">
            <!-- IF USER NOT FOUND -->
            <?php if (is_null($user)): ?>
                <p>Utilizador não encontrado.</p>
            <?php else: ?>
                <p>Bio: <?= htmlspecialchars($user['bio'] ?? 'Este utilizador ainda não escreveu uma bio.') ?></p>
                <p>Membro desde: <?= date('d/m/Y', strtotime($user['created_at'])) ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once BASE_PATH . '/components/footer.php'; ?>

<!-- 


            <form action="index.php" method="get">
                diz ao router que é a página de pesquisa
                <input type="hidden" name="page" value="search">
-->