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

function set_hobby(object $pdo, string $userId, string $name, string $hobbyDescription, string $interest, string $filePath)
{
    $query = "INSERT INTO hobbies (users_id, name, hobby_description, interest, image) VALUES (:users_id, :name, :hobby_description, :interest, :image)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":users_id", $userId);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":hobby_description", $hobbyDescription);
    $stmt->bindParam(":interest", $interest);
    $stmt->bindParam(":image", $filePath);

    $stmt->execute();
}