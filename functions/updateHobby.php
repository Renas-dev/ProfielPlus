<?php
// This require is needed to connect to the database
require_once '../includes/dbh.inc.php';

// This is a function that saves an image to a file
function saveImageToFile($imageData, $filePath) {
    $data = file_get_contents($imageData);
    file_put_contents($filePath, $data);
}

// This gets the selected id by using $_GET
$selectedId = $_GET['id'];

// This is the code for the image data and path
$imageData = $_FILES['image']['tmp_name'];
$filePath = '';

// This is an if statement that checks if $imageData is uploaded it runs the saveImageToFile() function.
if (!empty($imageData)) {
    $filePath = '../hobby_images/' . time() . "_" . $_FILES['image']['name'];
    saveImageToFile($imageData, $filePath);
}

// This is the data that the form sends using the post method
$name = $_POST['name'];
$hobby_description = $_POST['hobby_description'];
$interest = $_POST['interest'];

// This query sets the hobby values to the ones that are sent in the post where the id equals to the selected id.
$sql = "UPDATE hobbies SET name = :name, hobby_description = :hobby_description, interest = :interest";

// This is a check that if the $imageData has value it adds the 'image = :image' in the $sql
if (!empty($imageData)) {
    $sql .= ", image = :image";
}

// This adds the $sql below after the $sql above with the value of id equals to the given id
$sql .= " WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":hobby_description", $hobby_description);
$stmt->bindParam(":interest", $interest);
$stmt->bindParam(":id", $selectedId);

// This code checks if the image has value and if it does it adds the new uploaded image to the selected id.
if (!empty($imageData)) {
    $stmt->bindParam(":image", $filePath);
    $deleteSql = "SELECT image FROM hobbies WHERE id = :id";
    $deleteStmt = $pdo->prepare($deleteSql);
    $deleteStmt->bindParam(":id", $selectedId);
    $deleteStmt->execute();
    $result = $deleteStmt->fetch(PDO::FETCH_ASSOC);

    // This code checks if the $result code is executed and the image in $result exists it unlinks the image
    if ($result && !empty($result['image'])) {
        unlink($result['image']);
    }
}

$stmt->execute();

// This redirects you to /hobby
header('location: /hobby');
