<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: Welcome.php"); // Redirect to login page after logout
exit;
?>