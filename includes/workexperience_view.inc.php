<?php

declare(strict_types=1);

function experience_inputs()
{
    echo '<input type="hidden" name="userId" value="' . output_id() . '">';
    echo '<input type="text" name="name" placeholder="Work experience name">';
    echo '<input type="text" name="colleagues" placeholder="Colleagues">';
    echo '<input type="text" name="functionality" placeholder="Functionality">';
    echo '<input type="date" name="startDate" placeholder="Start Date">';
    echo '<input type="date" name="endDate" placeholder="End Date">';
}

function check_profile_errors()
{
    if (isset($_SESSION['errors_profile'])) {
        $errors = $_SESSION['errors_profile'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_profile']);
    } else if (isset($_GET["profile"]) && $_GET["profile"] === "success") {
        echo '<p class="form-success">Experience successfully added!</p>';
        echo "<br>";
    }
}