<?php
// This gets the post from the form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST["userId"];
    $name = $_POST["name"];
    $hobbyDescription = $_POST["hobby_description"];
    $interest = $_POST["interest"];

    $imageData = $_FILES['image']['tmp_name'];
    $filePath = '../hobby_images/' . time() . "_" . $_FILES['image']['name'];

    // this requires the required files and has error handling and eventually uses the create function with the required values from the post.
    try {
        require_once 'dbh.inc.php';
        require_once 'hobbies_model.inc.php';
        require_once 'hobbies_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($userId)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_image_not_selected($imageData)) {
            $errors["empty_image"] = "Please select an image.";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_hobby"] = $errors;

            $hobbiesData = [
                "userId" => $userId,
                "name" => $name,
                "hobby_description" => $hobbyDescription,
                "interest" => $interest,
                "image" => $filePath
            ];
            $_SESSION["hobbies_data"] = $hobbiesData;

            header("location: /hobby");
            die();
        }

        create_hobby($pdo, $userId, $name, $hobbyDescription, $interest, $filePath);
        saveImageToFile($imageData, $filePath);

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
