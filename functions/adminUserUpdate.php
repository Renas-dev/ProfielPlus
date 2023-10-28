<?php
require_once '../includes/dbh.inc.php';

$id = $_POST['userid'];


if (isset($_POST['submit'])) {
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $studentnumber = ($_POST['student_number']);
    $telephone = ($_POST['telephone']);
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $pwd = ($_POST['pwd']);
    $sql = "update users set firstname='$firstname', lastname='$lastname', student_number='$studentnumber', telephone='$telephone'
             , username='$username' , email='$email', pwd=:pwd where id=$id";
    $query = $pdo->prepare($sql);
    $query->bindParam(":pwd", $hashedPwd);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $query->execute();
     header('location: /admin');
}
