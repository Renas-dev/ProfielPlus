<?php
// These files are required to display, connect to session and connect to database
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to ProfielPlus</title>
    <link rel="stylesheet" href="../views/css/layout.css">
    <link rel="stylesheet" href="../views/css/login.css">
</head>

<body class="container">
    <header class="header"><?php @require 'partials/header.php' ?></header>

    <!-- The login file checks if a user is not logged in by checking the session and if so it displays the
form to login else it won't. The same for logout if the user is logged in it shows the logout button else it doesn't display  -->
    <div class="page-content">
        <h3><?php output_username(); ?></h3>

        <?php
        if (!isset($_SESSION["user_id"])) { ?>
            <h2>Login</h2>

            <form action="../includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button class="button">Login</button>
            </form>

            <!--        <a href="/forgot-password">Forgot password?</a>-->
        <?php } ?>


        <?php
        check_login_errors();
        ?>

        <h2 class="register">Register</h2>

        <p class="registerText"><a href="/register">No account click me to register</a></p>


        <?php
        check_signup_errors();
        ?>

        <?php
        if (isset($_SESSION["user_id"])) { ?>
            <br>
            <h2>Logout</h2>

            <form action="../includes/logout.inc.php" method="post">
                <button onclick="logoutAlert()" class="button">Logout</button>
            </form>
        <?php } ?>
    </div>

    <footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>

</html>