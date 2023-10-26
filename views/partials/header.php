<link rel="stylesheet" href="../../views/css/header.css">

<div class="nav-logo">
    <img src="../../views/public/images/profileplusLogo.png" alt="mrsLogo">
</div>
<nav class="nav">
    <ul class="nav-items">
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/home' ? 'active' : '');?> href="/home">Home</a></li>
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/about-us' ? 'active' : '');?> href="/about-us">About us</a></li>
        <li><a <?= ($_SERVER['REQUEST_URI'] == '/register' ? 'active' : '');?> href="/register">Register</a></li>
    </ul>
</nav>
    <a <?= ($_SERVER['REQUEST_URI'] == '/login' ? 'active' : '');?> href="/login">
    <button class="Login-button">Login</button>
</a>

