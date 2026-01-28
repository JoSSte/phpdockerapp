<?php

namespace JoSSte\Phpdockerapp;

use PDO;
use JoSSte\Phpdockerapp\config\Database;

class FruitRepository
{
    public static function getAllFruits($colour, $calories): array
    {

        $dbh = Database::getConnection();

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
        $returnarray = [];
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $returnarray[] = $row;
        }
        return $returnarray;
    }

    public static function getAllFruitsUnfiltered(): array
    {

        $dsn = 'mysql:dbname=userdb;host=db';
        $user = 'root';
        $password = 'test';

        $dbh = new PDO($dsn, $user, $password);

        $calories = 4;
        $colour = 'red';

        $sth = $dbh->prepare('SELECT fruitname, colour, calories FROM fruit');
        $sth->execute();
        $returnarray = [];
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $returnarray[] = $row;
        }
        return $returnarray;
    }
}
