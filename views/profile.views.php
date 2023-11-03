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
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/login.css">
    <link rel="stylesheet" href="../views/css/profile.css">
</head>

<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>

<div class="main">
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
                    <img src="<?= $hobby['image']; ?>"></img>
                    <p><b>Name of the hobby:</b> <?= $hobby['name']; ?></p>
                    <p><b>Description:</b> <?= $hobby['hobby_description']; ?></p>
                    <p><b>Interest:</b> <?= $hobby['interest']; ?></p>
                </div>
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
<footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>

</html>
