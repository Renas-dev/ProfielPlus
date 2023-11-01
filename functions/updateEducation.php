<?php
require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];

$name = $_POST['name'];

$sql = "UPDATE education SET name = :name WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->execute();

header('location: /education');
