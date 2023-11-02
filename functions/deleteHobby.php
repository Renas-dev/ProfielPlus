<?php
// The require statement makes a connection with the Database
require_once '../includes/dbh.inc.php';

/* This code gets the selected ID by using the $_GET method and deletes the hobby where
the selected id is equal to id after executing it redirects you to the hobby page*/
$selectedId = $_GET['id'];
$image = $_GET['img'];

// The unlink function removes the file where the $image path is located at
unlink($image);

$sql = "DELETE FROM hobbies WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Sends you back to /hobby after executing the sql statement
header('location: /hobby');