<?php
if ($_SESSION['user_username'] == 'admin') {
    //We make sure to check if the user that's logged in has the same name as Admin before we display the admin page
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
        <link rel="stylesheet" href="../views/css/admin.home.css">
    </head>
    <!--The container class has the grid layout property to start our grid. -->
    <body class="container">
    <!--The header has a top-content which uses the top-content section in our grid layout,
    we also require our header with php to display our website header that can be found in the views directory-->
    <header class="top-content"><?php @require 'partials/header.php' ?></header>
    <!--The div with the page-content class has the page-content section in our grid layout. ensuring a min height of 100vw-->
    <div class="page-content">
        <div class="admin-container">
            <table class="admin-table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Studentnumber</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">operations</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "select * from users";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($users as $user) {
                    // We run a sql query that selects all users from our database and loops through all users and displays them.
                    ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['student_number'] ?></td>
                        <td><?= $user['telephone'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['created_at'] ?></td>
                        <td><?= $user['updated_at'] ?></td>
                        <td class="button-container">
                            <form method="post" action="/admin-update-user">
                                <input type="hidden" name="userid" value="<?= $user['id'] ?>">
                                <button class="admin-button-update" type="submit">Update</button>
                            </form>
                            <form method="post" action="/admin-delete-user">
                                <input type="hidden" name="userid" value="<?= $user['id'] ?>">
                                <button class="admin-button-delete" type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <!--The footer has a bottom-content which uses the bottom-content section in our grid layout,
    we also require our footer with php to display our website header that can be found in the views directory-->
    <footer class="bottom-content"><?php @require 'partials/footer.php' ?></footer>
    </body>
    </html>
    <?php
} else {
    echo 'You have no permission to view this page!';
}
?>