<?php
$id = $_POST['userid'];
$sql = "select * from users where id = $id ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//We first catch the user id with the POST SUPERGLOBAL and then select all data from the student and display this.
?>
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
        <?php
        foreach ($users

        as $user){

        ?>
        <div>
            <form method="post" action="../functions/adminUserUpdate.php">
                <div>
                    <input type="hidden" name="userid" value="<?= $id ?>">
                    <label> name
                        <input type="text" name="firstname" autocomplete="off" value="<?= $user['firstname'] ?>">
                    </label>
                </div>
                <div>
                    <label> lastname
                        <input type="text" name="lastname" autocomplete="off" value="<?= $user['lastname'] ?>">
                    </label>
                </div>
                <div>
                    <label> Student Number
                        <input type="text" name="student_number" autocomplete="off"
                               value="<?= $user['student_number'] ?>">
                    </label>
                </div>
                <div>
                    <label> Telephone
                        <input type="text" name="telephone" autocomplete="off" value="<?= $user['telephone'] ?>">
                    </label>
                </div>
                <div>
                    <label> username
                        <input type="text" name="username" autocomplete="off" value="<?= $user['username'] ?>">
                    </label>
                </div>
                <div>
                    <label> email
                        <input type="text" name="email" autocomplete="off" value="<?= $user['email'] ?>">
                    </label>
                </div>
                <div>
                    <label> password
                        <input type="password" name="pwd" autocomplete="off" value="">
                    </label>
                </div>
                <button class="admin-button" type="submit" name="submit">update</button>
            </form>
            <?php } ?>
        </div>
    </div>
    <!--The footer has a bottom-content which uses the bottom-content section in our grid layout,
    we also require our footer with php to display our website header that can be found in the views directory-->
    <footer class="bottom-content"><?php @require 'partials/footer.php' ?></footer>
    </body>
    </html>
<?php
?>