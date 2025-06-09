<?php

/* DONT SHOW NAVBAR IN REGISTER/LOGIN PAGES */
$page = $_GET['page'] ?? 'login';
if (!in_array($page, ['login', 'register'])):

?>
    <nav>
        <div class="container">
            <!-- LINKS -->
            <div class="links">
                <a href="?page=home">Home</a>
                <a href="?page=profile">Profile</a>
                <a href="../modules/user/logout.php">Logout</a>

                <!-- FOR DEBUG -->
                <a href="?page=fhgjaskjfa" style="color: red;">404 FORCE</a>
                <a href="?page=register" style="color: red;">Register</a>
                <a href="?page=login" style="color: red;">Login</a>
            </div>
            <!-- SEARCH USER -->
            <form action="index.php" method="get">
                <!-- diz ao router que é a página de pesquisa -->
                <input type="hidden" name="page" value="search">

                <!-- texto que o utilizador digita -->
                <input type="text" name="q" id="search" placeholder="Search user…" required>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </nav>
<?php endif; ?>