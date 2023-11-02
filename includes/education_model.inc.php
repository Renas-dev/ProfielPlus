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

function set_education(object $pdo, string $userId, string $name)
{
    $query = "INSERT INTO education (users_id, name) VALUES (:users_id, :name)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $stmt->bindParam(":users_id", $userId);
    $stmt->bindParam(":name", $name);

    $stmt->execute();
}