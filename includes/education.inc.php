<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST["userId"];
    $name = $_POST["name"];

    try {
        require_once 'dbh.inc.php';
        require_once 'education_model.inc.php';
        require_once 'education_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($userId, $name)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $educationData = [
                "userId" => $userId,
                "name" => $name,
            ];
            $_SESSION["education_data"] = $educationData;

            header("location: /education");
            die();
        }

        create_education($pdo, $userId, $name);

        header("location: /education");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: /education");
    die();
}
