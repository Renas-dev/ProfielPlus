<?php
// This code destroys the session to make you log out.
session_start();
session_unset();
session_destroy();

header("location: /");
die();