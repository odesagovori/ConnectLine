<?php
session_start();
session_destroy();
header("Location: Login.php"); // Redirect to login page after logout
exit;
?>
