<?php require_once 'header.php'; ?>
<div class="container">
    <h2>Register</h2>
    <form method="post" action="../modules/user/register_process.php">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">

        <label for="username">Username: </label>
        <input type="text" name="username" id="username">

        <label for="email">Email: </label>
        <input type="email" name="email" id="email">

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <label for="confirm_password">Confirm Password: </label>
        <input type="password" name="confirm_password" id="confirm_password">

        <button type="submit" class="btn btn-primary">Register</button>
        <button type="reset" class="btn btn-danger">Reset fields</button>
        <p>Already have an account? <a href="?page=login">login</a> here</p>
    </form>
</div>

<?php require_once 'footer.php'; ?>