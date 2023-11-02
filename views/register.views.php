<?php
// These files are required to display, connect to session and connect to database
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/home_view.inc.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/login.css">
    <title>Register Page</title>
</head>
<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>
<div class="main">
    <h2>Register</h2>

    <!-- This form sends you to signup.inc.php and uses the signup_inputs() function to display the form.
    It uses the post method to send the files to where it registers you. -->
    <form action="../includes/signup.inc.php" method="post">
        <?php signup_inputs() ?>
        <button class="button">Signup</button>
    </form>

    <?php
    check_signup_errors();
    ?>
</div>
<footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>
</html>
