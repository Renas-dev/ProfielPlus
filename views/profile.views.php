<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/profile_view.inc.php';
require_once '../includes/home_view.inc.php';
require_once '../includes/dbh.inc.php';
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
</head>
<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>

<div class="main">
    <h2>Create Work experience</h2>

    <?php
    if (isset($_SESSION["user_id"])) { ?>
        <form action="../includes/profile.inc.php" method="post">
            <?php experience_inputs() ?>
            <button class="button">submit</button>
        </form>
    <?php } else echo "You are not logged in!" ?>

    <?php
    check_profile_errors();

    if (isset($_SESSION["user_id"])) {
        $userId = $_SESSION["user_id"];
        $sql = "SELECT * FROM work_experience WHERE users_id = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($experiences as $experience) {
            echo "<div>";
            echo "<h3>" . $experience['name'] . "</h3>";
            echo "<p>Colleagues: " . $experience['colleagues'] . "</p>";
            echo "<p>Functionality: " . $experience['functionality'] . "</p>";
            echo "<p>Start Date: " . $experience['start_date'] . "</p>";
            echo "<p>End Date: " . $experience['end_date'] . "</p>";
            echo "<a href='editExperience.view.php?id=" . $experience['id'] . "'><button>Edit</button></a>";
            echo "<a href='../functions/deleteExperience.php?id=" . $experience['id'] . "'><button>Delete</button></a>";
            echo "</div>";
            echo "<br>";
        }
    }
    ?>
</div>
<footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>
</html>
