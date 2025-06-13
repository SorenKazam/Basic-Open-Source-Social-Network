<?php

/* PREVENTS ANOTHER USER BESIDES SESSION USER TO ACCESS THE PROFILE SETTINGS! */
if ($_GET['id'] != $_SESSION['user_id']) {
    header("Location: ../index.php");
    exit;
}

?>
<div class="container">
    <h2>Profile Settings</h2>
    <form action="../modules/user/profile/settings_process.php" method="POST">
        <h3>Basic information</h3>
        <label for="name">Your name: </label>
        <input type="text" name="name" id="name" placeholder="<?php echo $user['name']; ?>">

        <label for="username">Your username: </label>
        <input type="text" name="username" id="username" placeholder="<?php echo $user['username']; ?>">

        <label for="email">Your email: </label>
        <input type="email" name="email" id="email" placeholder="<?php echo $user['email']; ?>">

        <label for="password">Your password: </label>
        <input type="password" name="password" id="password" placeholder="Enter your new password">

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <h5>Dangerous zone</h5>
    <a href="#" style="color: red;">Delete account</a>
</div>