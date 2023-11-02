<?php
// This require is needed to connect to the database
require "../includes/dbh.inc.php";

// This gets the token sent from the mail in the url
$token = $_GET["token"];

// This hashes the token using the PHP hash function and saves it as a variable
$token_hash = hash("sha256", $token);

// This query selects the user where the $token equals to the hashed token
$sql = "SELECT * FROM users WHERE reset_token_hash = :token";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":token", $token_hash);
$stmt->execute();

// This fetches an associative array and is stored as $user
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// This gets the current time and sets the reset_token_expires_at as a string.
$currentTime = time();
$tokenExpirationTime = strtotime($user["reset_token_expires_at"]);

// This is a check to see if the token exists.
if ($user === null) {
    die("Token not found");
}

// This is a check to see if the token is expired.
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
    <!-- This HTML form sends the password and token to the process-reset-password.php using method="post" -->
    <h1>Reset password</h1>
    <form method="post" action="process-reset-password.php">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
    <label for="password">New password</label>
    <input type="password" id="password" name="pwd">
    <button>Change password</button>
    </form>
</body>
</html>

