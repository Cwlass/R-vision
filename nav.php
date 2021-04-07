<?php
include_once "database.php";
session_start();
?>

<header>
    <a href="home.php">HOME</a>
    <a href="songs.php">SONGS</a>
    <a href="artist.php">ARTISTS</a>
    <a href="">PLAYLISTS</a>
    <?php
    if (!isset($_SESSION["firstname"])) {
        echo "<a href='login.php'>LOG IN</a>";
        echo "<a href='register.php'>REGISTER</a>";
    } else {
        echo "<p> Welcome " . $_SESSION['firstname'] . "</p>";
        echo "<a href='logout.php'>LOG OUT</a>";
    }
    ?>
</header>