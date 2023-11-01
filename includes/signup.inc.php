<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $student_number = $_POST['student_number'];
    $telephone = $_POST['telephone'];


    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($username, $pwd, $email, $fname, $lname, $student_number)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "This username already exists!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("location: /register");
            die();
        }

        create_user($pdo, $pwd, $username, $email, $fname, $lname, $student_number, $telephone);

        header("location: /login");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: /register");
    die();
}
