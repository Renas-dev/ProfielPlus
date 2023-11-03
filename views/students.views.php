<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/students.css">
</head>

<body class="container">
    <header class="header"><?php @require 'partials/header.php' ?></header>
    <div class="main">
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


<footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>

</html>