<?php
require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];
$sql = "DELETE FROM work_experience WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();

header('location: ../views/profile.views.php');