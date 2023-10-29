<?php require_once './includes/dbh.inc.php';

if ($_SESSION['user_username'] == 'admin') {
    ?>
    <li><a <?= ($_SERVER['REQUEST_URI'] == '/admin' ? 'active' : ''); ?> href="/admin">Admin Page</a></li>
    <li><a <?= ($_SERVER['REQUEST_URI'] == '/create user' ? 'active' : ''); ?> href="/admin-add-user">Create user</a>
    </li>
<?php } else {
    echo 'You have no permission to view this page!';
}
?>
