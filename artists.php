<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include_once "nav.php";
    include_once "database.php";

    if ($conn) {
        $query = "SELECT * FROM artiste";

        $results = mysqli_query($conn, $query);

        $artists = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    ?>
    <div class="ArtCont">
        <?php foreach ($artists as $artist) : ?>
            <div class="artistBio">
                <h2><?= $artist["name"]; ?></h2>
                <h3><?= $artist["gender"]; ?></h3>
                <h4><?= $artist["date_of_birth"]; ?></h4>
                <p><?= substr($artist["bio"], 0, 20); ?></p>
                <h5>Number of songs : <?php
                                        $queryArt = 'SELECT * FROM artiste INNER JOIN songs ON artiste_id = artiste.id WHERE artiste_id =' . $artist["id"];
                                        $resultsArt = mysqli_query($conn, $queryArt);
                                        $songCount = count(mysqli_fetch_all($resultsArt, MYSQLI_ASSOC));
                                        echo $songCount;
                                        ?></h5>




            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>