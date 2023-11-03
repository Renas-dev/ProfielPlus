<?php
if ($_SESSION['user_username'] == 'admin') {
    ?>
    <li><a <?= ($_SERVER['REQUEST_URI'] == '/admin' ? 'active' : ''); ?> href="/admin">Admin Page</a></li>
    <li><a <?= ($_SERVER['REQUEST_URI'] == '/create user' ? 'active' : ''); ?> href="/admin-add-user">Create user</a>
    </li>
<?php } else {
    echo 'You have no permission to view this page!';
    //Before loading in the header to give the admin easy access to the admin panel we do a check if the admin is an actual admin user.
}
?>
