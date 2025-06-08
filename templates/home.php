<?php require_once 'header.php'; ?>
<div class="container">
    <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
    <a href="../modules/user/logout.php">Logout</a>
</div>
<?php require_once 'footer.php'; ?>