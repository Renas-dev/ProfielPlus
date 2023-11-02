<?php

declare(strict_types=1);

// These are the functions for error handling and create
function is_input_empty(string $username, string $pwd, string $email, string $fname, string $lname, string $student_number)
{
    if (empty($username) || empty($pwd) || empty($email) || empty($fname)  || empty($lname)  || empty($student_number)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $pwd, string $username, string $email, string $fname, string $lname, string $student_number, string $telephone)
{
    set_user($pdo, $pwd, $username, $email, $fname, $lname, $student_number, $telephone);
}