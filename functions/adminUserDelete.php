<?php
require './includes/dbh.inc.php';

$id = $_POST['userid'];
$sql = "DELETE FROM users WHERE id=$id;";
$query = $pdo->prepare($sql);
$query->execute();
header('location: /admin');

