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


    $sql = "insert into users (firstname,lastname,student_number,telephone,username,pwd,email)
values ('$firstname', '$lastname', '$studentnumber', '$telephone' ,'$username',:pwd, '$email');";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":pwd", $hashedPwd);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->execute();
    header('location: /admin');
}



