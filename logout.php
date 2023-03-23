<?php
session_start(); // Access the existing session.

// Cancel the session:
$_SESSION = array(); // Clear the variables.
session_destroy(); // Destroy the session itself.
setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

// Redirect user to home page
// header("Location:index.php");
echo '<script>setTimeout(function(){location.href="index"},0);</script>';
?>