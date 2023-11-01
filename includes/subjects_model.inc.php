<?php

declare(strict_types=1);
function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_subject(object $pdo, string $userId, string $name, float $grade)
{
    $query = "INSERT INTO subjects (users_id, name, grade) VALUES (:users_id, :name, :grade)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $stmt->bindParam(":users_id", $userId);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":grade", $grade);

    $stmt->execute();
}