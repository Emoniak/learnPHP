<header>
    <nav>
        <ul>
            <li><a href ="index.php?page=home">Home</a></li>
            <li><a href ="index.php?page=registration">Inscription</a></li>
            <li><a href ="index.php?page=login">Login</a></li>
            <?php
            if ($_SESSION['login']==true) {
                echo "<li><a href =\"index.php?page=logout\">Deconexion</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>