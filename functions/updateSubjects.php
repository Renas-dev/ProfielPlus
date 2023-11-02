<?php
// This require is needed to connect to the database
require_once '../includes/dbh.inc.php';

// This gets the selected id by using $_GET
$selectedId = $_GET['id'];

// These are the subjects values that gets sent by the form as a post.
$name = $_POST['name'];
$grade = $_POST['grade'];

// This query sets the subject values to the ones that are sent in the post where the id equals to the selected id.
$sql = "UPDATE subjects SET name = :name, grade = :grade WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":grade", $grade);
$stmt->execute();

// This redirects you to /subjects
header('location: /subjects');
