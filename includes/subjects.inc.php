<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST["userId"];
    $name = $_POST["name"];
    $grade = $_POST["grade"];

    try {
        require_once 'dbh.inc.php';
        require_once 'subjects_model.inc.php';
        require_once 'subjects_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($userId, $name)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $subjectsData = [
                "userId" => $userId,
                "name" => $name,
                "grade" => $grade
            ];
            $_SESSION["education_data"] = $subjectsData;

            header("location: /subjects");
            die();
        }

        create_subject($pdo, $userId, $name, $grade);

        header("location: /subjects");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: /subjects");
    die();
}
