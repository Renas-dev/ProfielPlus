<?php
// These files are required to display, connect to session and connect to database
require_once './includes/config_session.inc.php';
require_once './includes/education_view.inc.php';
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
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/profile-edit.css">
</head>
<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>

<!-- The education file checks if a user is logged in by checking the session and if so it displays the
form to create an education there is also an edit and delete button at the display of the created educations. -->
<div class="main">
    <h2>Create Education</h2>

    <?php
    if (isset($_SESSION["user_id"])) { ?>
        <form action="../includes/education.inc.php" method="post" class="create">
            <?php education_inputs(); ?>
            <button class="button">submit</button>
        </form>
    <?php } else echo "You are not logged in!" ?>

    <?php
    check_education_errors();

    if (isset($_SESSION["user_id"])) {
        $userId = $_SESSION["user_id"];
        $sql = "SELECT * FROM education WHERE users_id = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($educations as $education) {
            ?>
            <div class="display">
                <p hidden='hidden'><?= $education['id'] ?></p>
                <h3><?= $education['name'] ?></h3>
                <form method='post' action='/profile-update-education'>
                    <input type='hidden' name='id' value=<?= $education['id'] ?>>
                    <button class="button">Edit</button>
                </form>
                <a href='../functions/deleteEducation.php?id=<?= $education['id'] ?>'>
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
