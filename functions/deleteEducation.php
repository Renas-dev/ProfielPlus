<?php
// The require statement makes a connection with the Database
require_once '../includes/dbh.inc.php';

/* This code gets the selected ID by using the $_GET method and deletes the education where
the selected id is equal to id after executing it redirects you to the education page*/
$selectedId = $_GET['id'];
$sql = "DELETE FROM education WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Sends you back to /education after executing the sql statement
header('location: /education');