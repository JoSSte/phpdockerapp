<?php
require_once 'vendor/autoload.php';

use JoSSte\Phpdockerapp\FruitRepository;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fruits</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Fruits</h1>
    <table class="striped-table">
        <caption>Fruits</caption>
        <thead>
            <tr class="green">
                <th>Name</th>
                <th>Colour</th>
                <th>Calories</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $fruits = FruitRepository::getAllFruitsUnfiltered();


            foreach ($fruits as $fruit) {
                echo "            <tr>\n" .
                    "               <td>" . $fruit["fruitname"] . "</td>\n" .
                    "               <td>" . $fruit["colour"] . "</td>\n" .
                    "               <td>" . $fruit["calories"] . "</td>\n" .
                    "            </tr>\n";
            }

            ?>
        </tbody>
    </table>

    <!-- 
    <pre><?php var_dump($fruits); ?></pre>
    -->
</body>

</html>