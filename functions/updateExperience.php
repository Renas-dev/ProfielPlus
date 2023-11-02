<?php
// This require is needed to connect to the database
require_once '../includes/dbh.inc.php';

// This gets the selected id by using $_GET
$selectedId = $_GET['id'];

// These are the work experience values that gets sent by the form as a post.
$name = $_POST['name'];
$colleagues = $_POST['colleagues'];
$functionality = $_POST['functionality'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate'];

// This query sets the work experience values to the ones that are sent in the post where the id equals to the selected id.
$sql = "UPDATE work_experience SET name = :name, colleagues = :colleagues, functionality = :functionality, start_date = :start_date, end_date = :end_date WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":colleagues", $colleagues);
$stmt->bindParam(":functionality", $functionality);
$stmt->bindParam(":start_date", $start_date);
$stmt->bindParam(":end_date", $end_date);
$stmt->execute();

// This redirects you to /work-experience
header('location: /work-experience');
