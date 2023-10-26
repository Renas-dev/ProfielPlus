<?php
require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];

$name = $_POST['name'];
$colleagues = $_POST['colleagues'];
$functionality = $_POST['functionality'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate'];

$sql = "UPDATE work_experience SET name = :name, colleagues = :colleagues, functionality = :functionality, start_date = :start_date, end_date = :end_date WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":colleagues", $colleagues);
$stmt->bindParam(":functionality", $functionality);
$stmt->bindParam(":start_date", $start_date);
$stmt->bindParam(":end_date", $end_date);
$stmt->execute();

header('location: ../views/profile.views.php');
