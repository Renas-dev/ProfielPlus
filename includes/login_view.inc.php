<?php

declare(strict_types=1);

// This file has the display functions to show text on the page that calls a function
function output_username() {
    if (isset($_SESSION["user_id"])) {
        echo "<p class='login-status'>You are logged in as " . $_SESSION["user_username"] . "</p>";
    } else {
        echo "<p class='login-status'>You are not logged in</p>";
    }
}

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';

        }
        
        unset($_SESSION['errors_login']);
    } elseif (isset($_GET['login']) && $_GET['login'] === "success") {
            echo "<br>";
            echo '<p class="form-success">Login success!</p>';
            echo "<br>";
    }
}