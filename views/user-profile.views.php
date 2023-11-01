<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to ProfielPlus!</title>
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/home.css">
</head>

<body class="container">
    <header class="header"><?php @require 'partials/header.php' ?></header>
    <div class="main">
        <h1>Werkervaringen</h1>
            <?php 
            
            $userId = $_POST["user_id"];
            $sql = "SELECT * FROM work_experience WHERE users_id = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
            $stmt->execute();
            $experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($experiences as $experience) {


            ?>
            <div>
                <table>
                    <tr>
                        <td><?= $experience ['name']; ?></td>
                        <td><?= $experience ['colleagues']; ?></td>
                        <td><?= $experience ['functionality']; ?></td>
                        <td><?= $experience ['start_date']; ?></td>
                        <td><?= $experience ['end_date']; ?></td>
                    </tr>
                </table>
            </div>
            <?php } ?>
        </div>
    <footer class="footer"><?php @require 'partials/footer.php' ?></footer>
</body>

</html>
<?php
?>
