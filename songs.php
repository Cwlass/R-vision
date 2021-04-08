<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include_once "nav.php";
    $artiste;

    if ($conn) {

        $query = "SELECT * FROM songs INNER JOIN artiste ON artiste_id = artiste.id";
        if (isset($_POST["artist"])) {
            $query = "SELECT * FROM songs INNER JOIN artiste ON artiste_id = artiste.id ORDER BY name ";
        } elseif (isset($_POST["songs"])) {
            $query = "SELECT * FROM songs INNER JOIN artiste ON artiste_id = artiste.id ORDER BY title";
        }

        $results = mysqli_query($conn, $query);

        $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }


    if (isset($_POST["playlist"])) {
        echo $_POST["songid"];

        $newQuery = "INSERT INTO playlist_content (playlist_id,song_id) VALUES ('" .  $_POST['songid'] . $_SESSION["id"] .  "')";
    }


    ?>
    <h1>SONGS</h1>

    <form action="" method="POST" class="form">
        <h2>Sort by : </h2>
        <input type="submit" value="Artist" name="artist">
        <input type="submit" value="Songs" name="songs">
    </form>

    <div class="songCont">
        <?php foreach ($songs as $song) : ?>
            <div class="songInfo">
                <h2><?= $song["title"]; ?></h2>
                <h3><?= $song["name"]; ?></h3>
                <form action="" id="noStyle" method="POST">
                    <input type="submit" value="Add To playlist" name="playlist">
                    <input type="hidden" value="<?php echo $song['ID']; ?>" name="songid">
                </form>
            </div>

        <?php endforeach; ?>
    </div>
</body>

</html>