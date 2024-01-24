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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../views/css/layout.css">
    <link rel="stylesheet" href="../views/css/profile-edit.css">
</head>
<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>

<!-- The subjects file checks if a user is logged in by checking the session and if so it displays the
form to create a subject there is also an edit and delete button at the display of the created subjects. -->
<div class="page-content">
    <h2>Create Subject</h2>

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
                <a href='../functions/deleteSubject.php?id=<?= $subject['id'] ?>'>
                    <button class="button">Delete</button>
                </a>
            </div>
            <br>

            <?php
        }
    }
    ?>
</div>
<footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>
</html>
