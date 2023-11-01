<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST["userId"];
    $name = $_POST["name"];
    $colleagues = $_POST["colleagues"];
    $functionality = $_POST["functionality"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    try {
        require_once 'dbh.inc.php';
        require_once 'workexperience_model.inc.php';
        require_once 'workexperience_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($userId, $name, $colleagues, $functionality, $startDate, $endDate)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $profileData = [
                "userId" => $userId,
                "name" => $name,
                "colleagues" => $colleagues,
                "functionality" => $functionality,
                "startDate" => $startDate,
                "endDate" => $endDate
            ];
            $_SESSION["profile_data"] = $profileData;

            header("location: /work-experience");
            die();
        }

        create_experience($pdo, $userId, $name, $colleagues, $functionality, $startDate, $endDate);

        header("location: /work-experience");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: /work-experience");
    die();
}
