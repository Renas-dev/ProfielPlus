<?php
require_once '../includes/dbh.inc.php';

$id = $_POST['userid'];

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $studentnumber = $_POST['student_number'];
    $telephone = $_POST['telephone'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Check if PWD field is not empty
    if (!empty($_POST['pwd'])) {
        $pwd = $_POST['pwd'];
        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', student_number='$studentnumber', telephone='$telephone', username='$username', email='$email', pwd=:pwd WHERE id=$id";
    } else {
        // If PWD is empty dont change PWD field
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', student_number='$studentnumber', telephone='$telephone', username='$username', email='$email' WHERE id=$id";
    }

    $query = $pdo->prepare($sql);
    if (!empty($_POST['pwd'])) {
        $query->bindParam(":pwd", $hashedPwd);
    }

    $query->execute();
    header('location: /admin');
}