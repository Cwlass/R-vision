<?php

/*
    -- Exercise 1 :
    
    Using to this array : 
    $array = array(
        'lastname' => 'simon',
        'firstname' => 'simon',
        'phone' => '+3526455748'
        'mail' => 'simon@simon.fr',
        'address' => '6 rue de la gare',
        'city' => 'Mondelange'
    );

    With a loop, display the content of this array (keys and values)
*/

$array = array(
    'lastname' => 'simon',
    'firstname' => 'simon',
    'phone' => '+3526455748',
    'mail' => 'simon@simon.fr',
    'address' => '6 rue de la gare',
    'city' => 'Mondelange'
);

foreach ($array as $key => $value) {
    echo $key . " : " . $value . "<br>";
}




/* -- Exercise : 
	1 :
	Create a function 'multiplicationTable'
	2 :
	This function should have on argument $x
	3:
	The function should return the multiplication table of $x (from 1 to 20).
	4 :
	Create a form with one input.
	When you validate this form, it should display the multiplication table of the number you entered (using the function).
	You have to check if the value is correct (no float and no string, ONLY integer).
	5 :
	Display the multiplication table in a nice HTML format table style.
*/
function multiplicationTable($num = 1)
{

    for ($i = 1; $i <= 20; $i++) {
        $mult = $num * $i;
        echo "<td>" . $mult . "</td>";
    }
}
?>
<br>
<br>
<br>
<table>
    <tr>
        <?php
        for ($i = 1; $i <= 20; $i++) {
            echo "<th>" . $i . "</h>";
        }
        ?>
    </tr>
    <tr>
        <?php
        multiplicationTable((int)$_POST["num"]);
        ?>
    </tr>
</table>
<br>
<br>
<br>

<form action="" method="post">
    <input type="text" name="num" id="">
    <input type="submit" value="Submit" name="go">
</form>