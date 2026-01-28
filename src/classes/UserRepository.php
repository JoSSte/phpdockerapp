<?php

namespace JoSSte\Phpdockerapp;

use PDO;
use JoSSte\Phpdockerapp\config\Database;

abstract class UserRepository
{
    public static function getAllUsers(): array
    {
        $dbh = Database::getConnection();

        $sth = $dbh->prepare('select * from user');
        $sth->execute();
        $returnarray = [];
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $returnarray[] = $row;
        }
        return $returnarray;
    }
}
