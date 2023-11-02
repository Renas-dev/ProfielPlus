<?php

declare(strict_types=1);

function is_input_empty(string $userId, string $name, string $grade)
{
    if (empty($userId) || empty($name) || empty($grade)) {
        return true;
    } else {
        return false;
    }
}

function create_subject(object $pdo, string $userId, string $name, float $grade)
{
    set_subject($pdo, $userId, $name, $grade);
}