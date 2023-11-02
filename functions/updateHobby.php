<?php
function saveImageToFile($imageData, $filePath) {
    $data = file_get_contents($imageData);
    file_put_contents($filePath, $data);
}

require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];

$imageData = $_FILES['image']['tmp_name'];
$filePath = '';

if (!empty($imageData)) {
    // Generate a new file path for the image
    $filePath = '../hobby_images/' . time() . "_" . $_FILES['image']['name'];
    saveImageToFile($imageData, $filePath);
}

$name = $_POST['name'];
$hobby_description = $_POST['hobby_description'];
$interest = $_POST['interest'];

// Use prepared statements to prevent SQL injection
$sql = "UPDATE hobbies SET name = :name, hobby_description = :hobby_description, interest = :interest";
if (!empty($imageData)) {
    // If a new image is provided, update the image path in the database
    $sql .= ", image = :image";
}

$sql .= " WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":hobby_description", $hobby_description);
$stmt->bindParam(":interest", $interest);
$stmt->bindParam(":id", $selectedId);

if (!empty($imageData)) {
    // If a new image is provided, update the image field
    $stmt->bindParam(":image", $filePath);

    // Now, remove the old image if it exists
    $deleteSql = "SELECT image FROM hobbies WHERE id = :id";
    $deleteStmt = $pdo->prepare($deleteSql);
    $deleteStmt->bindParam(":id", $selectedId);
    $deleteStmt->execute();
    $result = $deleteStmt->fetch(PDO::FETCH_ASSOC);

    if ($result && !empty($result['image'])) {
        // Remove the old image
        unlink($result['image']);
    }
}

$stmt->execute();

header('location: /hobby');
