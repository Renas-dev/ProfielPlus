<?php

declare(strict_types=1);

// This file has the display functions to show text on the page that calls a function
function output_username() {
    if (isset($_SESSION["user_id"])) {
        echo "<p class='login-status'>You are logged in as " . $_SESSION["user_username"] . "</p>";
        echo "<p class='login-status'>Email: " . $_SESSION["user_email"] . "</p>";
    } else {
        echo "<p class='login-status'>You are not logged in</p>";
    }
}

function output_id() {
    if (isset($_SESSION["user_id"])) {
        return $_SESSION["user_id"];
    }
    return null;
}
