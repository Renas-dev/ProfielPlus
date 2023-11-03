<?php
require_once '../includes/dbh.inc.php';
if (isset($_POST['submit'])) {
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $studentnumber = ($_POST['student_number']);
    $telephone = ($_POST['telephone']);
    $username = ($_POST['username']);
    $pwd = ($_POST['pwd']);
    $email = ($_POST['email']);
    //First we catch all our data with the POST SUBERGLOBA.

    $sql = "insert into users (firstname,lastname,student_number,telephone,username,pwd,email)
            values ('$firstname', '$lastname', '$studentnumber', '$telephone' ,'$username',:pwd, '$email');";
    //Second we write our SQL query with the needed values.
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":pwd", $hashedPwd);
    //We prepare our sql query and password hashing
    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    //The passwords gets hashed
    $stmt->execute();
    header('location: /admin');
    //The query gets executed with the hashed password and the admin gets redirected to the admin page.
}



