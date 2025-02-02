<?php
// Start the session if it's not already started
session_start();

// Clear the session and cookie data
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Destroy the session
session_destroy();

// Prevent the page from being cached by the browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect the user to the login page
header("Location: Login.php");
exit();
?>

<script>
window.history.replaceState({}, document.title, window.location.pathname);
</script>
