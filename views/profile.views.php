<?php
require_once './includes/config_session.inc.php';
require_once './includes/home_view.inc.php';
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
    <link rel="stylesheet" href="../views/css/user-profile.css">
    <link rel="stylesheet" href="../views/css/profile.css">
</head>
<!--The container class has the grid layout property to start our grid. -->
<body class="container">
<!--The header has a top-content which uses the top-content section in our grid layout,
we also require our header with php to display our website header that can be found in the views directory-->
<header class="top-content"><?php @require 'partials/header.php' ?></header>
<!--The div with the page-content class has the page-content section in our grid layout. ensuring a min height of 100vw-->
    <div class="page-content">
        <div class="workexperience">
            <h1>Workexperience</h1>
            <?php

            // This is an SELECT statement that is used to display experiences.
            $userId = $_SESSION["user_id"];
            $sql = "SELECT * FROM work_experience WHERE users_id = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
            $stmt->execute();
            $experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($experiences as $experience) {


            ?>
                <div class="userInfo">
                    <p><b>Field of expertise:</b> <?= $experience['name']; ?></p>
                    <p><b>Colleagues:</b> <?= $experience['colleagues']; ?></p>
                    <p><b>Function:</b> <?= $experience['functionality']; ?></p>
                    <p><b>Experience duration:</b> <?= $experience['start_date']; ?> / <?= $experience['end_date']; ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="hobbys">
            <h1>Hobbys</h1>
            <?php


        // This is an SELECT statement that is used to display hobbys.
        $userId = $_SESSION["user_id"];
        $sql = "SELECT * FROM hobbies WHERE users_id = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $hobbys = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hobbys as $hobby) {


            ?>
                <div class="userInfo">
                    <img src="<?= $hobby['image'] ?>" alt="Hobby Image">
                    <?php if (!empty($hobby['name'])) { // Check if the name field is not empty
                        echo '<p><b>Name of the hobby:</b> ' . $hobby['name'] . '</p>';
                    } ?>
                    <?php if (!empty($hobby['hobby_description'])) { // Check if the hobby_description field is not empty
                        echo '<p><b>Description:</b> ' . $hobby['hobby_description'] . '</p>';
                    } ?>
                    <?php if (!empty($hobby['interest'])) { // Check if the interest field is not empty
                        echo '<p><b>Interest:</b> ' . $hobby['interest'] . '</p>';
                    } ?>
                </div>
                <br>
            <?php } ?>
        </div>
        <div class="education">
            <h1>Education</h1>
            <?php

            // This is an SELECT statement that is used to display educations.
            $userId = $_SESSION["user_id"];
            $sql = "SELECT * FROM education WHERE users_id = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
            $stmt->execute();
            $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($educations as $education) {

            ?>
            <div class="userInfo">
                <p><b>Name of the education:</b> <?= $education['name'] ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="subjects">
        <h1>Subjects</h1>
        <?php

        // This is an SELECT statement that is used to display subjects.
        $userId = $_SESSION["user_id"];
        $sql = "SELECT * FROM subjects WHERE users_id = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($subjects as $subject) {


            ?>
            <div class="userInfo">
                <p><b>Name of the subject:</b> <?= $subject['name'] ?></p>
                <p><b>Grade: </b><?= $subject['grade'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>
<!--The footer has a bottom-content which uses the bottom-content section in our grid layout,
we also require our footer with php to display our website header that can be found in the views directory-->
<footer class="bottom-content"><?php @require 'partials/footer.php' ?></footer>
</body>

</html>