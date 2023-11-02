<?php
require_once '../includes/dbh.inc.php';

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM users WHERE reset_token_hash = :token";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":token", $token_hash);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);
$userId = $user['id'];

$currentTime = time();
$tokenExpirationTime = strtotime($user["reset_token_expires_at"]);

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}

    $pwd = ($_POST['pwd']);

    $sql = "UPDATE users SET pwd = :pwd, reset_token_hash = null, reset_token_expires_at = null WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $userId);
    $stmt->bindParam(":pwd", $hashedPwd);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->execute();
    header('location: /login');



