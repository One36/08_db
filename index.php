<?php
require('application/config/config_db.php');

function connectDB() {
    $dbcx = mysqli_connect(HOST, USER, PASS, DB);

    mysqli_set_charset($dbcx, 'UTF8');

    return $dbcx;
}

function getUser() {

    $userList = [];

    $dbcx = connectDB();

    $query = 'SELECT id, user, password
			FROM login
			ORDER BY user';

    $result = mysqli_query($dbcx, $query);

    $userList = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $userList;
}

function getUserById($id) {

    $username = [];

    $dbcx = connectDB();

    $query = 'SELECT id, user, password
		FROM login
		WHERE id = ' . $id;

    $result = mysqli_query($dbcx, $query);

    $username = mysqli_fetch_assoc($result);

    return $$username;
}

function save($username) {

    if ($username['id'] == 0) {

        insert($username);
    } else {

        update($username);
    }
}

function insert($username) {

    $dbcx = connectDB();

    $query = '
			INSERT INTO login(user, password)
			VALUES("%s", "%s")';

    $query = sprintf($query, $username['Username'], $username['Password']
    );

    mysqli_query($dbcx, $query);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 08 DB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css">    
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <h1>Nutzer hinzufügen</h1>

            <form method="post" action="index.php">
                <label>Benutzername
                    <input class="form-control" required type="text" name="username">
                </label>
                <label>Kennwort
                    <input class="form-control" required type="password" name="password">
                </label>
                <hr>
                <button class="btn">INSERT</button>
            </form>
        </div>

    </body>
</html>
