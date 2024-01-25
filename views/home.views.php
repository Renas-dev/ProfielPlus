<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to ProfielPlus!</title>
    <link rel="stylesheet" href="../views/css/layout.css">
    <link rel="stylesheet" href="../views/css/home.css">
    <link rel="stylesheet" href="../views/css/profile-edit.css">
</head>
<!--The container class has the grid layout property to start our grid.-->
<body class="container">
<!--The header has a top-content which uses the top-content section in our grid layout,
we also require our header with php to display our website header that can be found in the views directory-->
<header class="top-content"><?php @require 'partials/header.php' ?></header>
<!--The div with the page-content class has the page-content section in our grid layout. ensuring a min height of 100vw-->
<div class="page-content">
    <h1>Welcome op de MRS Student Site.</h1>
    <div>
        <h3>
            The page to use to keep everyone updated about what you are doing.
        </h3>
    </div>
    <div style="width: 80%">
        <h1 class="about">About us</h1>
        <div class="about-coders">
            <?php
            // This is a multidimensional array with all the dev info.
            $classmateInfo = [
                "Mitchel Meskes" => [
                    "Role" => "Dev",
                    "Age" => "20",
                    "Bio" => "If you look to the left you see nothing to the right.",
                ],
                "Renas Khalil" => [
                    "Role" => "Dev",
                    "Age" => "23",
                    "Bio" => "Cats are the best pets!",
                ],
                "Sadek Al Mouaswi" => [
                    "Role" => "Dev",
                    "Age" => "21",
                    "Bio" => "You can never have enough coffee!",
                ]
            ];

            // A loop that prints all the keys and values from the multi dimensional array.
            $keys = array_keys($classmateInfo);
            for ($i = 0; $i < count($classmateInfo); $i++) {
                echo "<h2><b>" . $keys[$i] . "</b></h2><br>";
                foreach ($classmateInfo[$keys[$i]] as $key => $value) {
                    echo "<b>" . $key . " : </b>" . $value . "<br>";
                }
                echo "<br>";
            }
            ?>
        </div>
    </div>
</div>
<!--The footer has a bottom-content which uses the bottom-content section in our grid layout,
we also require our footer with php to display our website header that can be found in the views directory-->
<footer class="bottom-content"><?php @require 'partials/footer.php' ?></footer>
</body>

</html>
