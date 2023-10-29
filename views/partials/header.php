<link rel="stylesheet" href="../../views/css/header.css">

<div class="nav-logo">
    <img src="../../views/public/images/profileplusLogo.png" alt="mrsLogo">
</div>
<nav class="nav">
    <ul class="nav-items">
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/home' ? 'active' : ''); ?> href="/home">Home</a></li>
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/about-us' ? 'active' : ''); ?> href="/about-us">About us</a></li>
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/profile' ? 'active' : ''); ?> href="/profile">Profile</a></li>
        <?php if ($_SESSION['user_username'] == 'admin') {
            require './views/adminHeader.views.php';
        } ?>
    </ul>
</nav>
<a <?= ($_SERVER['REQUEST_URI'] == '/login' ? 'active' : ''); ?> href="/login">
    <img src="../../views/public/images/user-regular-24.png" alt="profile">
</a>

