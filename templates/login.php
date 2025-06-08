<?php require_once 'header.php'; ?>
<?php

/* IF THERE IS A SESSION TAKE USER TO THE HOME PAGE */
if (isset($_SESSION)) {
    header("Location: ../public/index.php?page=home");
}

?>
<div class="container">
    <h2>Login</h2>
    <form method="post" action="../modules/user/login_process.php">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>

        <label>
            <input type="checkbox" name="remember_me" value="1">
            Remember me
        </label>

        <button type="submit" class="btn btn-primary">Login</button>
        <p>Don't have an account yet? <a href="?page=register">register</a> here for free.
    </form>
</div>
<?php require_once 'footer.php'; ?>