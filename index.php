<?php
$routes = [
    "/" => "controllers/home.php",
    "/login" => "controllers/login.php",

];

if(array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    require $routes[$_SERVER['REQUEST_URI']];
} else {
    echo "404 Website url does not exist!";
}
?>