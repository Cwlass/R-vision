<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
include_once "database.php";
include_once "nav.php";
?>

<body>
    <section class="accountSection">
        <h1>Account Settings</h1>
        <h2>Logged in</h2>
        <div class="accountSettings">
            <?php
            echo "<p> Hello, " . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . "</p>";
            echo "<p> Your current email: " . $_SESSION["email"] . "</p>";
            ?>
        </div>
    </section>
</body>

</html>