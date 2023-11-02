<?php
// This require is needed to connect to the database
require "../includes/dbh.inc.php";

/* This files sends the mail of the "reset password?" form by making a $token that is hashed and
has an expiry of 30 minutes. Where it sets the hash and expires at in the selected email's table.
*/
$email = $_POST["email"];
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 1800);

$sql = "UPDATE users SET reset_token_hash = :hash, reset_token_expires_at = :expiry WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":hash", $token_hash);
$stmt->bindParam(":expiry", $expiry);
$stmt->bindParam(":email", $email);
$stmt->execute();

// This code sends the email and displays a message if the mail is sent or not.
if ($stmt->execute()) {
    $mail = require __DIR__ . '/../functions/mailer.php';

    $mail->setFrom("profielplus@noreply.com");
    $mail->addAddress($email);
    $mail->Subject = "Password reset";
    $mail->Body = <<<END
    Click <a href="http://localhost:8000/functions/reset-password.php?token=$token">here</a>
    to reset your password
    END;

    try {
        $mail->send();
        echo "Message sent, please check your inbox.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
} else {
    echo "Password reset request failed.";
}
