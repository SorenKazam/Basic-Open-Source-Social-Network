<h2>Register</h2>
<form method="post" action="index.php?page=register_process">
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

    <button type="reset">Reset fields</button>
    <button type="submit">Register</button>
    <a href="?page=login">Login</a>
</form>