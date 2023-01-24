<?php

ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

include '../app/vendor/autoload.php';
//$foo = new App\Acme\Foo();

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <form action="times.php" method="post">
            <label for="email">E-Mail</label>
            <input type="email" id="email" required>
            <label for="password">Passwort</label>
            <input type="password" id="password" required>
            <button type="submit">Senden</button>
        </form>
    </body>
</html>
