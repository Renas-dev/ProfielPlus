<?php

declare(strict_types=1);

// This file has the display functions to show text on the page that calls a function
function education_inputs()
{
    echo '<input type="hidden" name="userId" value="' . output_id() . '">';
    echo '<input type="text" name="name" placeholder="Education name">';
}

function check_education_errors()
{
    if (isset($_SESSION['errors_education'])) {
        $errors = $_SESSION['errors_education'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_education']);
    } else if (isset($_GET["education"]) && $_GET["education"] === "success") {
        echo '<p class="form-success">Education successfully added!</p>';
        echo "<br>";
    }
}