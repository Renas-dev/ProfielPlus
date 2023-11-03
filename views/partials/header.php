<link rel="stylesheet" href="../../views/css/header.css">

<div class="nav-logo">
    <a href="/"><img src="../../views/public/images/profileplusLogo.png" alt="mrsLogo"></a>
</div>
<nav class="nav">
    <ul class="nav-items">
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/home' ? 'active' : ''); ?> href="/home">Home</a></li>
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/students' ? 'active' : ''); ?> href="/students">Students</a></li>
        <?php if (isset($_SESSION["user_id"])) { ?>
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/profile' ? 'active' : ''); ?> href="/profile">Profile</a></li>
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/edit-profile' ? 'active' : ''); ?> href="/edit-profile">Edit Profile</a></li>
        <?php } ?>
        <?php if ($_SESSION['user_username'] == 'admin') {
            require './views/adminHeader.views.php';
        } ?>
    </ul>
</nav>
<a <?= ($_SERVER['REQUEST_URI'] == '/login' ? 'active' : ''); ?> href="/login">
    <img src="../../views/public/images/user-regular-24.png" alt="profile">
</a>

