<?php

declare(strict_types=1);

function hobby_inputs()
{
    echo '<input type="hidden" name="userId" value="' . output_id() . '">';
    echo '<input type="text" name="name" placeholder="Hobby name">';
}

function check_hobby_errors()
{
    if (isset($_SESSION['errors_profile'])) {
        $errors = $_SESSION['errors_profile'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_profile']);
    } else if (isset($_GET["profile"]) && $_GET["profile"] === "success") {
        echo '<p class="form-success">Hobby successfully added!</p>';
        echo "<br>";
    }
}