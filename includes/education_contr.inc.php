<?php

declare(strict_types=1);

function is_input_empty(string $userId, string $name)
{
    if (empty($userId) || empty($name)) {
        return true;
    } else {
        return false;
    }
}

function create_education(object $pdo, string $userId, string $name)
{
    set_education($pdo, $userId, $name);
}