<?php
include_once "database.php";
session_start();
?>

<header>
    <a href="home.php">HOME</a>
    <a href="songs.php">SONGS</a>
    <a href="artists.php">ARTISTS</a>
    <?php
    if (!isset($_SESSION["firstname"])) {
        echo '<a href="login.php">PLAYLISTS</a>';
    } else {
        echo '<a href="playlist.php">PLAYLISTS</a>';
    }
    ?>
    <?php
    if (!isset($_SESSION["firstname"])) {
        echo "<a href='login.php'>LOG IN</a>";
        echo "<a href='register.php'>REGISTER</a>";
    } else {
        echo "<a href='account.php'> Welcome " . $_SESSION['firstname'] . "</a>";
        echo "<a href='logout.php'>LOG OUT</a>";
    }
    ?>

</header>