<?php

declare(strict_types=1);

// This file has the display functions to show text on the page that calls a function
function hobby_inputs()
{
    echo '<input type="hidden" name="userId" value="' . output_id() . '">';
    echo '<input type="text" name="name" placeholder="Hobby">';
    echo '<input type="text" name="hobby_description" placeholder="hobby Description">';
    echo '<input type="text" name="interest" placeholder="Interest">';
    echo '<input type="file" name="image">';

}

function check_hobby_errors()
{
    if (isset($_SESSION['errors_hobby'])) {
        $errors = $_SESSION['errors_hobby'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_hobby']);
    } else if (isset($_GET["hobby"]) && $_GET["hobby"] === "success") {
        echo '<p class="form-success">Hobby successfully added!</p>';
        echo "<br>";
    }
}