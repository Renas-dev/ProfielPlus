<?php
require_once './includes/config_session.inc.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit profile</title>
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/login.css">
</head>
<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>

<div class="main">
    <a href="/work-experience"><button class="button">Experience</button></a>
    <a href="/hobby"><button class="button">Hobby</button></a>
    <a href="/education"><button class="button">Education</button></a>
    <a href="/subjects"><button class="button">Subjects</button></a>
</div>

<footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>
</html>
