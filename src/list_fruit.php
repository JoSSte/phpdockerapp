<?php
require_once 'vendor/autoload.php';

use JoSSte\Phpdockerapp\FruitRepository;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fruits</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <h1>Fruits</h1>
    <table class="striped-table">
        <caption>Fruits</caption>
        <thead>
            <tr class="dark">
                <th>Name</th>
                <th>Colour</th>
                <th>Calories</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach (FruitRepository::getAllFruitsUnfiltered() as $fruit) {
                echo "            <tr>\n" .
                    "               <td>" . $fruit["fruitname"] . "</td>\n" .
                    "               <td>" . $fruit["colour"] . "</td>\n" .
                    "               <td>" . $fruit["calories"] . "</td>\n" .
                    "               <td>" . /* $fruit["type"] . */ "</td>\n" .
                    "            </tr>\n";
            }

            ?>
        </tbody>
    </table>
</body>

</html>