<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <link rel="stylesheet" href="../views/css/layout.css">
    <link rel="stylesheet" href="../views/css/students.css">
</head>
<!--The container class has the grid layout property to start our grid. -->
<body class="container">
<!--The header has a top-content which uses the top-content section in our grid layout,
we also require our header with php to display our website header that can be found in the views directory-->
    <header class="top-content"><?php @require 'partials/header.php' ?></header>
    <!--The div with the page-content class has the page-content section in our grid layout. ensuring a min height of 100vw-->
    <div class="page-content">
        <div class="profile-header">
            <h1>All profiles.</h1>
        </div>
        <div class="profile-container">
            <?php
            $sql = "select * from users";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $user) {
            ?>

                <div class="profile-name">
                    <td><b><?= $user['username'] ?></b></td>
                </div>

                <div class="profiles-content">
                    <tr>
                        <td> <b>Profile updated at:</b> <?= $user['updated_at'] ?></td><br>
                        <form method="post" action="/user-profile">
                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                            <button class="admin-button-update button" type="submit">Visit User</button>
                        </form>
                    </tr>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
    <!--The footer has a bottom-content which uses the bottom-content section in our grid layout,
    we also require our footer with php to display our website header that can be found in the views directory-->
<footer class="bottom-content"><?php @require 'partials/footer.php' ?></footer>
</body>

</html>