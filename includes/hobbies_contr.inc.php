<?php

declare(strict_types=1);

// These are the functions for error handling and create
function is_input_empty(string $userId)
{
    if (empty($userId)) {
        return true;
    } else {
        return false;
    }
}

function is_image_not_selected($imageData)
{
    if (empty($imageData)) {
        return true;
    } else {
        return false;
    }
}

function create_hobby(object $pdo, string $userId, string $name, string $hobbyDescription, string $interest, string $filePath)
{
    set_hobby($pdo, $userId, $name, $hobbyDescription, $interest, $filePath);
}

function saveImageToFile($imageData, $filePath) {
    $data = file_get_contents($imageData);
    file_put_contents($filePath, $data);
}