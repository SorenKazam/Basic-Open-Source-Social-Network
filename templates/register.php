<?php require_once __DIR__ . '/../components/header.php'; ?>
<!-- REGISTRATION PAGE -->
<div class="container">
    <h2>Register</h2>
    <form method="post" action="../modules/user/register_process.php">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required>

        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>

        <label for="confirm_password">Confirm Password: </label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit" class="btn btn-primary">Register</button>
        <button type="reset" class="btn btn-danger">Reset fields</button>
        <p>Already have an account? <a href="?page=login">login</a> here</p>
    </form>
</div>

<?php require_once __DIR__ . '/../components/footer.php'; ?>