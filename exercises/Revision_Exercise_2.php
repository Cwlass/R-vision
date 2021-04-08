<?php

/*
	1. Display the type of each variable at the end of the script (using only one function)
	2. Display the type AND the value of each variable (using only one function)
*/
include_once "database2.php";

$x = 5;
$y = "1";
$z = true;
$n = 2.5;

$z = $x + $y;
$k = $n * $y;
echo gettype($x) .  "<br>";
echo gettype($y) .  "<br>";
echo gettype($z) .  "<br>";
echo gettype($n) .  "<br>";
echo gettype($k) .  "<br>";

var_dump($x);
var_dump($y);
var_dump($z);
var_dump($n);
var_dump($k);
echo "<br>";



/*
	Show the date (in a nice format) for :
		- Today
		- Tomorrow
		- The same date than today one month later
*/

echo date('F j, Y, g:i a')  .  "<br>";

$tomorrow = strtotime("+1 day");

echo date('F j, Y, g:i a', $tomorrow)  .  "<br>";

$nextMonth = strtotime("+1 month");

echo date('F j, Y, g:i a', $nextMonth)  .  "<br>";

/*
	Create an array with the numbers from 1 to 100 : Create it dynamically using a loop.
	Once it has been created, display it in a HTML list (ul/li)
*/
$myArray = [];
for ($i = 1; $i <= 100; $i++) {
    $myArray[] = $i;
}
varDump($myArray);
echo "<ul>";
for ($i = 0; $i < 100; $i++) {
    echo "<li>" . $myArray[$i] . "</li>";
}
echo "</ul>";
/*
	Using the moviedb :
	1. Connect to the database and choose the moviedb
	2. Run a query to get all movies by George Lucas
	3. Display the movies in a HTML <table>
		You should display title, views, the poster and the name of the director.
*/
if ($conn) {
    $query = "SELECT * FROM movies INNER JOIN directors ON director_id = directors.id WHERE firstName = 'George' AND lastName = 'Lucas'";
    $results = mysqli_query($conn, $query);
    $films = mysqli_fetch_all($results, MYSQLI_ASSOC);
} ?>

<table style="border: solid black 1px;">
    <tr style="border: solid black 1px;">
        <th style="border: solid black 1px;">Title</th>
        <th style="border: solid black 1px;">Name</th>
        <th style="border: solid black 1px;">Poster</th>
    </tr>
    <?php foreach ($films as $film) : ?>
        <tr style="border: solid black 1px;">
            <td style="border: solid black 1px;"><?= $film["Title"]; ?></td>
            <td style="border: solid black 1px;"><?= $film["firstName"]; ?> <?= $film["lastName"]; ?></td>
            <td style="border: solid black 1px;"><img style="width: 100px;" src="<?= $film["poster"]; ?>" alt=""></td>
        </tr>
    <?php endforeach; ?>

</table>