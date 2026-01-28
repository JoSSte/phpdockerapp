<!DOCTYPE html>
<html lang="en">
<?php
require_once 'vendor/autoload.php';

use JoSSte\Phpdockerapp\UserRepository;
?>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Users</h1>
    <table class="striped-table">
        <caption>Users in DuckBurg</caption>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Created</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            <?php


            foreach (UserRepository::getAllUsers() as $user) {
                echo "            <tr>\n" .
                    "               <td>" . $user["username"] . "</td>\n" .
                    "               <td>" . $user["email"] . "</td>\n" .
                    "               <td>" . $user["create_date"] . "</td>\n" .
                    "               <td><time datetime=\"" . $user["last_update_date"] . "\">" . $user["last_update_date"] . "</time></td>\n" .
                    "            </tr>\n";
            }


            ?>
        </tbody>
    </table>
</body>

</html>