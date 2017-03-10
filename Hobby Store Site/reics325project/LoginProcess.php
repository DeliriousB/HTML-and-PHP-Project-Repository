<?php

//Assign users input variables
if(!isset($_POST["username"]) || !isset($_POST["password"])){
print "Username' or password are empty";
return;
}

else{
$userlogin = $_POST["username"];
$userpass = $_POST["password"];
}

// Create connection with database server
$db_connect = mysqli_connect("localhost", "root", "moe");
if (!$db_connect)
{
die(Connection unsuccessful: mysqli_connect_errno());
}

//Save user id and username in query variable
$sql="SELECT uid, username FROM 'user' WHERE (username='userlogin' AND password='$userpass')";

// Verify log in info
if(!mysqli_squery($db_connect,$sql))
	{
	print "username or password is not correct";
	return;
	}

?>