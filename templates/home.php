<?php require_once __DIR__ . '/../components/header.php'; ?>
<!-- MAIN HOME PAGE -->
<div class="container">
    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <a href="../modules/user/logout.php">Logout</a>
</div>
<?php require_once __DIR__ . '/../components/footer.php'; ?>