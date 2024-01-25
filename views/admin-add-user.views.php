<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to ProfielPlus!</title>
    <link rel="stylesheet" href="../views/css/layout.css">
    <link rel="stylesheet" href="../views/css/admin.form.css">
</head>
<!--The container class has the grid layout property to start our grid. -->
<body class="container">
<!--The header has a top-content which uses the top-content section in our grid layout,
we also require our header with php to display our website header that can be found in the views directory-->
<header class="top-content"><?php @require 'partials/header.php' ?></header>
<!--The div with the page-content class has the page-content section in our grid layout. ensuring a min height of 100vw-->
<div class="page-content">
    <div class="admin-add-user-container">
        <form action="../functions/adminUserAdd.php" method="post">
            <div>
                <label> Firstname
                    <input type="text" placeholder="enter the name" name="firstname" autocomplete="off">
                </label>
            </div>
            <div>
                <label> Lastname
                    <input type="text" placeholder="enter the lastname" name="lastname" autocomplete="off">
                </label>
            </div>
            <div>
                <label> Student number
                    <input type="text" placeholder="enter the studentnumber" name="student_number" autocomplete="off">
                </label>
            </div>
            <div>
                <label> Telephone
                    <input type="text" placeholder="enter the phonenumber" name="telephone" autocomplete="off">
                </label>
            </div>
            <div>
                <label> Username
                    <input type="text" placeholder="enter the username" name="username" autocomplete="off">
                </label>
            </div>
            <div>
                <label> Password
                    <input type="password" placeholder="enter your password" name="pwd" autocomplete="off">
                </label>
            </div>
            <div>
                <label> Email
                    <input type="email" placeholder="enter your email" name="email" autocomplete="off">
                </label>
            </div>
            <button class="admin-button" type="submit" name="submit">Submit</button>
        </form>

    </div>
</div>
<!--The footer has a bottom-content which uses the bottom-content section in our grid layout,
we also require our footer with php to display our website header that can be found in the views directory-->
<footer class="bottom-content"><?php @require 'partials/footer.php' ?></footer>
</body>
</html>
<?php
?>