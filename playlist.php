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
    if (isset($_POST["create"])) {
        if ($conn) {
            $query = "INSERT INTO playlists ('title','creation_date','user_id') VALUES ('" . $_POST['playlistName'] . "', '" . date('Y-m-d') . "','" . $_SESSION['id'] . "')";
            echo "<br>";
            echo "<br>";
            echo "<pre>";
            echo $query;
            echo "</pre>";
            if(mysqli_query($conn, $query)){
                echo "playlist created";
            }else{
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            
        }
    }

    if ($conn) {
        $pQuery = "SELECT * FROM playlists WHERE user_id = '" . $_SESSION['id'] . "'";
        $results = mysqli_query($conn, $pQuery);
        $playlists = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }

    ?>

    <h1><?php
        echo $_SESSION["firstname"];
        ?>'s playlists
    </h1>
    <section>
        <article>
            <?php foreach ($playlists as $playlist) : ?>
                <p><?= $playlist['title']; ?></p>
            <?php endforeach; ?>
        </article>
    </section>

    <form action="" method="POST">
        <input type="text" name="playlistName" id="" placeholder="Playlist name">
        <input type="submit" value="Create" name="create">
    </form>
</body>

</html>