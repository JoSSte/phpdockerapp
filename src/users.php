<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users</title>
</head>

<body>
    <h1>Users</h1>
    <table>
        <caption>Users in DuckBurg</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Create Date</th>
            </tr>
        </thead>
        <tbody>
<?php


            $dsn = 'mysql:dbname=userdb;host=db';
            $user = 'root';
            $password = 'test';

            $dbh = new PDO($dsn, $user, $password);


            $sth = $dbh->prepare('select * from user');

            $sth->execute();

            while ($result = $sth->fetch(PDO::FETCH_ASSOC)) {
                echo "            <tr>\n".
                    "               <td>" . $result["username"] . "</td>\n".
                    "               <td>" . $result["email"] . "</td>\n".
                    "               <td>" . $result["create_date"] . "</td>\n".
                    "            </tr>\n";
            }


            ?>
        </tbody>
    </table>
</body>

</html>
