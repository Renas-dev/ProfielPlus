<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST["userId"];
    $name = $_POST["name"];

    try {
        require_once 'dbh.inc.php';
        require_once 'hobbies_model.inc.php';
        require_once 'hobbies_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($userId, $name)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $hobbiesData = [
                "userId" => $userId,
                "name" => $name,
            ];
            $_SESSION["hobbies_data"] = $hobbiesData;

            header("location: /hobby");
            die();
        }

        create_hobby($pdo, $userId, $name);

        header("location: /hobby");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: /hobby");
    die();
}
