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
            <div class="profile">
                <!-- IF USER NOT FOUND -->
                <?php if (is_null($user)): ?>
                    <p>Utilizador não encontrado.</p>
                <?php else: ?>
                    <!-- USER INFORMATION -->
                    <!-- PFP -->
                    <img src="https://picsum.photos/200/300" alt="Profile picture" class="profile-picture">
                    <!-- NUMBER OF FOLLOWING AND FOLLOWERS -->
                    <p>21 FOLLOWING 30 FOLLOWERS</p>
                    <!-- USER BIO -->
                    <p>Bio: <?= htmlspecialchars($user['bio'] ?? 'Este utilizador ainda não escreveu uma bio.') ?></p>
                    <!-- USER DATE OF CREATION -->
                    <p>Membro desde: <?= date('d/m/Y', strtotime($user['created_at'])) ?></p>
            </div>
            <!-- PROFILE NAVIGATION -->
            <nav class="profile-navigation" id="profile-navigation">
                <a href="index.php?page=profile&menu=photos">Photos</a>
                <a href="index.php?page=profile&menu=followers">Followers</a>
                <a href="index.php?page=profile&menu=following">Following</a>
                <!-- ONLY SHOW SETTINGS BUTTON IF THE USER IS SESSION USER -->
                <?php if ($isOwnProfile): ?>
                    <a href="index.php?page=profile&menu=settings">Settings</a>
                <?php endif; ?>
            </nav>

            <!-- PROFILE NAVIGATION PAGES -->
            <?php
                    if (isset($_GET['menu'])) {
                        $profileMenu = $_GET['menu'];

                        if (!isset($_GET['menu'])) {
                            $profileMenu = 'photos';
                        }

                        switch ($profileMenu) {
                            case 'followers':
                                include_once '../modules/user/profile/followers_process.php';
                                break;
                            case 'following':
                                include_once '../modules/user/profile/following_process.php';
                                break;
                            case 'photos':
                                include_once '../modules/user/profile/photos_process.php';
                                break;
                            case 'settings':
                                include_once '../modules/user/profile/settings_process.php';
                                break;

                            default:
                                include_once '../modules/user/profile/photos_process.php';
                                break;
                        }
                    }
            ?>
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