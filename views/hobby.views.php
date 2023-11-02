<?php
// These files are required to display, connect to session and connect to database
require_once './includes/config_session.inc.php';
require_once './includes/hobbies_view.inc.php';
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
    <link rel="stylesheet" href="../views/css/login.css">
</head>
<body class="container">
<header class="header"><?php @require 'partials/header.php' ?></header>

<!-- The hobby file checks if a user is logged in by checking the session and if so it displays the
form to create an hobby there is also an edit and delete button at the display of the created hobbies. -->
<div class="main">
    <h2>Create Hobby</h2>

    <?php
    if (isset($_SESSION["user_id"])) { ?>
        <form action="../includes/hobbies.inc.php" method="post" enctype="multipart/form-data">
            <?php hobby_inputs(); ?>
            <button class="button">submit</button>
        </form>
    <?php } else echo "You are not logged in!" ?>

    <?php
    check_hobby_errors();

    if (isset($_SESSION["user_id"])) {
        $userId = $_SESSION["user_id"];
        $sql = "SELECT * FROM hobbies WHERE users_id = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($hobbies as $hobby) {
            ?>
            <div>
                <p hidden='hidden'><?= $hobby['id'] ?></p>
                <img src="<?= $hobby['image'] ?>" alt="Hobby Image">
                <?php if (!empty($hobby['name'])) { // Check if the name field is not empty
                    echo '<p>Hobby: ' . $hobby['name']. '</p>';
                } ?>
                <?php if (!empty($hobby['hobby_description'])) { // Check if the name field is not empty
                    echo '<p>Hobby description: ' . $hobby['hobby_description'] . '</p>';
                } ?>
                <?php if (!empty($hobby['interest'])) { // Check if the name field is not empty
                    echo '<p>Interest: ' . $hobby['interest']. '</p>';
                } ?>
                <form method='post' action='/profile-update-hobbies'>
                    <input type='hidden' name='id' value=<?= $hobby['id'] ?>>
                    <button>Edit</button>
                </form>
                <a href="../functions/deleteHobby.php?id=<?= $hobby['id'] ?>&img=<?= $hobby['image'] ?>">
                    <button>Delete</button>
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
