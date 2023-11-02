<?php

declare(strict_types=1);

// This file has the display functions to show text on the page that calls a function
function subject_inputs()
{
    echo '<input type="hidden" name="userId" value="' . output_id() . '">';
    echo '<input type="text" name="name" placeholder="Subject name">';
    echo '<input type="text" name="grade" placeholder="Your grade">';
}

function check_subject_errors()
{
    if (isset($_SESSION['errors_subjects'])) {
        $errors = $_SESSION['errors_subjects'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_subjects']);
    } else if (isset($_GET["subjects"]) && $_GET["subjects"] === "success") {
        echo '<p class="form-success">Subject successfully added!</p>';
        echo "<br>";
    }
}