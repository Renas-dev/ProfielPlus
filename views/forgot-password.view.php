<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../views/css/login.css">
    <title>Forgot password</title>
</head>
<body>

<h1>Forgot password</h1>
<!-- This file sends the email input using the post method to sendPasswordReset.php where it will be used. -->
<form method="post" action="../functions/sendPasswordReset.php">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <button class="button">Send</button>
</form>

</body>
</html>