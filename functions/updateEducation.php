<?php
// This require is needed to connect to the database
require_once '../includes/dbh.inc.php';

// This gets the selected id by using $_GET
$selectedId = $_GET['id'];

// This is the education name that gets sent by the form as a post.
$name = $_POST['name'];

// This query updates the education name in the education table where the id equals to the selected one.
$sql = "UPDATE education SET name = :name WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->execute();

// This redirects you back to /education
header('location: /education');
