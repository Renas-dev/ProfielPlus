<?php

declare(strict_types=1);

//This file has the functions for the SELECT and INSERT queries
function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_experience(object $pdo, string $userId, string $name, string $colleagues, string $functionality, string $startDate, string $endDate)
{
    $query = "INSERT INTO work_experience (users_id, name, colleagues, functionality, start_date, end_date) VALUES (:users_id, :name, :colleagues, :functionality, :start_date, :end_date)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $stmt->bindParam(":users_id", $userId);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":colleagues", $colleagues);
    $stmt->bindParam(":functionality", $functionality);
    $stmt->bindParam(":start_date", $startDate);
    $stmt->bindParam(":end_date", $endDate);

    $stmt->execute();
}