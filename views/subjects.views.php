<?php
require_once './includes/config_session.inc.php';
require_once './includes/subjects_view.inc.php';
require_once './includes/home_view.inc.php';
require_once './includes/dbh.inc.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../views/css/layout.css">
    <link rel="stylesheet" href="../views/css/profile-edit.css">
    <script src="../views/scripts/deleteConfirmation.js"></script>
</head>
<!--The container class has the grid layout property to start our grid. -->
<body class="container">
<!--The header has a top-content which uses the top-content section in our grid layout,
we also require our header with php to display our website header that can be found in the views directory-->
<header class="top-content"><?php @require 'partials/header.php' ?></header>
<!--The div with the page-content class has the page-content section in our grid layout. ensuring a min height of 100vw-->
<div class="page-content">
    <h2>Create Subject</h2>
    <!-- The subjects file checks if a user is logged in by checking the session and if so it displays the
    form to create a subject there is also an edit and delete button at the display of the created subjects. -->
    <?php
    if (isset($_SESSION["user_id"])) { ?>
        <form action="../includes/subjects.inc.php" method="post" class="create">
            <?php subject_inputs(); ?>
            <button class="button">submit</button>
        </form>
    <?php } else echo "You are not logged in!" ?>

        <?php
        check_subject_errors();

        if (isset($_SESSION["user_id"])) {
            $userId = $_SESSION["user_id"];
            $sql = "SELECT * FROM subjects WHERE users_id = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
            $stmt->execute();
            $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($subjects as $subject) {
        ?>
                <div class="display">
                    <p hidden='hidden'><?= $subject['id'] ?></p>
                    <h3><?= $subject['name'] ?></h3>
                    <h3><?= $subject['grade'] ?></h3>
                    <form method='post' action='/profile-update-subjects'>
                        <input type='hidden' name='id' value=<?= $subject['id'] ?>>
                        <button class="button">Edit</button>
                    </form>
                    <a href="#" onclick="confirmDelete(<?= $subject['id'] ?>, '../functions/deleteSubject.php?id=<?= $subject['id'] ?>');">
                        <button class="button">Delete</button>
                    </a>
                </div>
                <br>

        <?php
            }
        }
    ?>
</div>
<!--The footer has a bottom-content which uses the bottom-content section in our grid layout,
we also require our footer with php to display our website header that can be found in the views directory-->
<footer class="bottom-content"><?php @require 'partials/footer.php' ?></footer>
>>>>>>> ab5c3b62e1fcaa808eb76e1b34f5a30ec6e66e81
</body>

</html>