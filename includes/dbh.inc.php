<?php
$host = "localhost";
$dbname = "profielplus";
$dbusername = "root";
$dbpassword = "root";

// This makes a connection to the database using PDO.
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}