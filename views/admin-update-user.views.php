<?php
$id = $_POST['userid'];
$sql = "select * from users where id = $id ";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome to ProfielPlus!</title>
        <link rel="stylesheet" href="../views/css/default.css">
        <link rel="stylesheet" href="../views/css/admin.form.css">
    </head>
    <body class="container">
    <header class="header"><?php @require 'partials/header.php' ?></header>


    <div class="main">
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

    <footer class="footer"><?php @require 'partials/footer.php' ?></footer>
    </body>
    </html>
<?php
?>