<?php
// The require statement makes a connection with the Database
require_once '../includes/dbh.inc.php';

/* This code gets the selected ID by using the $_GET method and deletes the work_experience where
the selected id is equal to id after executing it redirects you to the work-experience page*/
$selectedId = $_GET['id'];
$sql = "DELETE FROM work_experience WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Sends you back to /work-experience after executing the sql statement
header('location: /work-experience');