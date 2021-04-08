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
        if (empty($_POST)) {
            $query = "SELECT * FROM songs INNER JOIN artiste ON artiste_id = artiste.id";

            $results = mysqli_query($conn, $query);

            $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);
        } elseif (isset($_POST["artist"])) {
            $query = "SELECT * FROM songs INNER JOIN artiste ON artiste_id = artiste.id ORDER BY name desc";

            $results = mysqli_query($conn, $query);

            $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);
        } elseif (isset($_POST["songs"])) {
            $query = "SELECT * FROM songs INNER JOIN artiste ON artiste_id = artiste.id ORDER BY title desc";

            $results = mysqli_query($conn, $query);

            $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
    }
    ?>
    <h1>SONGS</h1>

    <form action="">
        <h2>Sort by : </h2>
        <input type="submit" value="Artist" name="artist">
        <input type="submit" value="Songs" name="songs">
    </form>

    <div class="songCont">
        <?php foreach ($songs as $song) : ?>
            <div class="songInfo">
                <h2><?= $song["title"]; ?></h2>
                <h3><?= $song["name"]; ?></h3>
            </div>

        <?php endforeach; ?>
    </div>
</body>

</html>