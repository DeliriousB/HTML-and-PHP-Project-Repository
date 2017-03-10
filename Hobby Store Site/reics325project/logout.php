<?php

session_start();
session_destroy();
$Message='Logged out...';
header("Location: index.php?Message=" . urldecode($Message));

?>