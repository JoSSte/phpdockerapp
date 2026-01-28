<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fruits</title>
</head>

<body>
    <h1>Fruits</h1>
    <table>
        <caption>Fruit</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Colour</th>
                <th>Calories</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $dsn = 'mysql:dbname=userdb;host=db';
            $user = 'root';
            $password = 'test';

            $dbh = new PDO($dsn, $user, $password);

            $calories = 4;
            $colour = 'red';

            $sth = $dbh->prepare('SELECT fruitname, colour, calories
    FROM fruit
    WHERE calories < :calories AND colour = :colour');

            /* Sets a parameter value using its name */
            $sth->bindValue('calories', $calories, PDO::PARAM_INT);
            /* Optionally, parameter names can also be prefixed with colons ":" */
            $sth->bindValue(':colour', $colour, PDO::PARAM_STR);
            $sth->execute();

            while ($result = $sth->fetch(PDO::FETCH_ASSOC)) {
                echo "            <tr>\n" .
                    "               <td>" . $result["fruitname"] . "</td>\n" .
                    "               <td>" . $result["colour"] . "</td>\n" .
                    "               <td>" . $result["calories"] . "</td>\n" .
                    "            </tr>\n";
            }


            ?>
        </tbody>
    </table>
</body>

</html>