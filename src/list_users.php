<?php
require_once 'vendor/autoload.php';

use JoSSte\Phpdockerapp\UserRepository;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/user.css">
    <script src="scripts/user.js"></script>
</head>

<body>
    <section>
    <h1>Users</h1>
    <table class="striped-table">
        <caption>Users in DuckBurg</caption>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Created</th>
                <th>Last Updated</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php


            foreach (UserRepository::getAllUsers() as $user) {
                echo "            <tr>\n" .
                    "               <td class=\"username\">" . $user["username"] . "</td>\n" .
                    "               <td class=\"email\">" . $user["email"] . "</td>\n" .
                    "               <td>" . $user["create_date"] . "</td>\n" .
                    "               <td><time datetime=\"" . $user["last_update_date"] . "\">" . $user["last_update_date"] . "</time></td>\n" .
                    "               <td id=\"button-container-" . $user["username"] . "\">    <button class=\"edit-btn\" onclick=\"toggleEdit(event)\">Edit</button>  </td>\n" .
                    "            </tr>\n";
            }


            ?>
        </tbody>
    </table>
    </section>
    <section>
        <p>This table is inline editable. Currently, when you edit a line nothing happens. Ideally the edit is sent to the backend to be stored.</p>
        <p>Adding new users is not yet implemented.</p>
    </section>
</body>

</html>