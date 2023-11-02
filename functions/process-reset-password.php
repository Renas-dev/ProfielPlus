<?php
// This require makes a connection to the database
require_once '../includes/dbh.inc.php';

// This gets the token from the $_POST
$token = $_POST["token"];

// This is a hash that makes usage of the hash php feature and uses the $token
$token_hash = hash("sha256", $token);

// This is a sql query that shows the selected reset_token_hash
$sql = "SELECT * FROM users WHERE reset_token_hash = :token";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":token", $token_hash);
$stmt->execute();

// This fetches the statement where I call the user id
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$userId = $user['id'];

// This gets the current time and makes an expiration time for the user
$currentTime = time();
$tokenExpirationTime = strtotime($user["reset_token_expires_at"]);

// This is a check if the token exists
if ($user === null) {
    die("Token not found");
}

// This is a check if the token is expired.
if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}

/* This is where the password gets updated if there was a token and it isn't expired.
The $pwd is the $_POST password of the user that he/she sent from the form
*/
    $pwd = ($_POST['pwd']);

/* This query sets the token_hash and expires_at too NULL where the id equals to the user id.
Where the password is also sent to be updated to the one the user set in the form and eventually hashes it.
*/
    $sql = "UPDATE users SET pwd = :pwd, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $userId);
    $stmt->bindParam(":pwd", $hashedPwd);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->execute();
    header('location: /login');



