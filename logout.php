<?php
session_start();

$_SESSION = array();

//destroy session
session_destroy();

//redirect
header("Location: index.php");
exit;
?>