<?php
require "../includes/dbh.inc.php";

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM users WHERE reset_token_hash = :token";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":token", $token_hash);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the row as an associative array

$currentTime = time();
$tokenExpirationTime = strtotime($user["reset_token_expires_at"]);

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../views/css/login.css">
    <title>Reset password</title>
</head>
<body>
    <h1>Reset password</h1>
    <form method="post" action="process-reset-password.php">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
    <label for="password">New password</label>
    <input type="password" id="password" name="pwd">
    <button>Change password</button>
    </form>
</body>
</html>

