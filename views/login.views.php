<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to ProfielPlus</title>
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/login.css">
</head>
<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>
<div class="main">
    <div class="login-container">
        <h1>login</h1>
        <ul>
            <li class="login-content">
                <label class="login-label"><input class="login-input" type="text"
                                                  placeholder="Username">Username</label>
            </li>
            <li class="login-content">
                <label class="login-label"><input class="login-input" type="password" placeholder="Password">Wachtwoord</label>
            </li>
        </ul>
        <div class="login-sub-content">
            <button type="button" class="login-button">Login</button>
            <p>Forgot <a href="#">password?</a></p>
        </div>
    </div>
</div>
<footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>
</html>
