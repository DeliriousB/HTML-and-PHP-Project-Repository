<?php
session_start();
//if session 'name' is set, displays usersname
if(isset($_SESSION["name"])){
header("Location: index.php");
print "Welcome ".$_SESSION["name"]." | "."<a href=logout.php" title="logout">Logout</a>;
//If user is admin, display all users instead
if(isset($_SESSION["uid"])==1) print " | " <a href="allusers.php" title="users">Users</a>;
}
else
{
print "<a href="login.php" title="login"Log in</a>"." | "." <a href="register" title="register">Register</a>";
}

?>