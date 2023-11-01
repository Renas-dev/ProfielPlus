<?php
require 'includes/dbh.inc.php';
require 'controllers/routing.php';
require_once 'includes/config_session.inc.php';

if (array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    require $routes[$_SERVER['REQUEST_URI']];
} else {
    echo "404 Website url does not exist!";
}
?>