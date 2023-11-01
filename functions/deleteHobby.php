<?php
require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];
$sql = "DELETE FROM hobbies WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();

header('location: /hobby');