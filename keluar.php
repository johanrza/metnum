<?php
session_start();

$_SESSION = [];
session_unset();
session_destroy();

// hapus cookie
setcookie("__nn__", time() - 1);
setcookie("_adss__", time() - 1);
setcookie("p", time() - 1);
setcookie("_jbjb_", time() - 1);

header("Location: ./");
