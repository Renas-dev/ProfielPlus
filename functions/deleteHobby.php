<?php
require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];
$image = $_GET['img'];

unlink($image);

$sql = "DELETE FROM hobbies WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();

header('location: /hobby');