<?php require_once __DIR__ . '/../components/header.php'; ?>
<!-- LOGIN PAGE -->
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
<?php require_once __DIR__ . '/../components/footer.php'; ?>