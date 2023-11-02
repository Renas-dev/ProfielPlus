<?php

declare(strict_types=1);

// These are the functions for error handling and create
function is_input_empty(string $userId, string $name, string $colleagues, string $functionality, string $startDate, string $endDate)
{
    if (empty($userId) || empty($name) || empty($colleagues) || empty($functionality) || empty($startDate) || empty($endDate)) {
        return true;
    } else {
        return false;
    }
}

function create_experience(object $pdo, string $userId, string $name, string $colleagues, string $functionality, string $startDate, string $endDate)
{
    set_experience($pdo, $userId, $name, $colleagues, $functionality, $startDate, $endDate);
}