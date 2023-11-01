<?php
require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];

$name = $_POST['name'];

$sql = "UPDATE subjects SET name = :name, grade = :grade WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->execute();

header('location: /subjects');
