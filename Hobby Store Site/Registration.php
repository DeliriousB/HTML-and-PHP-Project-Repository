<!--
	Site By: Billy Lam
	Last Updated 5/23/16
	Site Purpose: To show off figures and merch I've amassed and give reviews or gush about such and such.
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	session_start();	
	$_SESSION['LoggedIn'];
	$_SESSION['Name'];
	$_SESSION['AdminCheck'];
?>

<head>
    <title>J-HobbyShop</title>
    <link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript" src="index.js"></script>
    <script src="clock.js" type="text/javascript"></script>
</head>
<body>

<tr id= "navRow">
	<div class="menuPartTwo">
		<ul><li class="left">
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">Category</button>
				<div id="myDropdown" class="dropdown-content">
					<?php
						$pdo = new PDO('mysql:host=localhost:3306;dbname=JHobby', 'root', '');
						$statement = $pdo->prepare("SELECT Category FROM category");
						$statement->execute();

						while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
							echo '<a href="Category.php">'.$row['Category'].'</a>';
						}
						
					?>	
				</div>
			</div>
			</li>

			<li><font color="white"><li>
			<?php if($_SESSION['LoggedIn'] == true): ?>
				<li><a href="Logout.php"><font color="white">Log Out</a><li>
			<?php endif; ?>
			<li><a href="Cart.php"><font color="white">Cart</a><li>
			<?php if($_SESSION['LoggedIn'] == true): ?>
				<li><a href="MyAccount.php"><font color="white">Account</a><li>
			<?php else: ?>
			<li><a href="Account.php"><font color="white">Account</a></li>
			<?php endif; ?>
			<li><a href="About.php"><font color="white">About</a></li>
			<li><a href="index.php"><font color="white">Home</a><li>
			<?php if($_SESSION['AdminCheck'] == 1): ?>
				<li><a href="AdminPanel.php"><font color="white">Admin Page</a><li>
			<?php endif; ?>
			<?php if($_SESSION['Name'] != null): ?>
				<li><a><font color="black">Welcome "
				<?php 
					echo $_SESSION['Name'];
				?>"</font></a></li>
			<?php endif; ?>
		</ul>
	</div>
</tr>
   

	<div class="main">

			<?php
			error_reporting(E_ALL & E_STRICT);
			ini_set('display_errors', '1');
			ini_set('log_errors', '0');
			ini_set('error_log', './');
			
			$pdo = new PDO('mysql:host=localhost:3306;dbname=JHobby', 'root', '');
			$stmt = $pdo->prepare("INSERT INTO users (UserName, FName, LName, Password, DoB, Gender, Address, State, Email) VALUES (:UserName, :FName, :LName, :Password, :DoB, :Gender, :Address, :State, :Email)");
			$stmt->bindParam(':UserName', $UserName);
			$stmt->bindParam(':FName', $FName);
			$stmt->bindParam(':LName', $LName);
			$stmt->bindParam(':Password', $Password);
			$stmt->bindParam(':DoB', $DoB);
			$stmt->bindParam(':Gender', $Gender);
			$stmt->bindParam(':Address', $Address);
			$stmt->bindParam(':State', $State);
			$stmt->bindParam(':Email', $Email);


			// insert row into database
			$UserName = $_POST['UserName'];
			$FName = $_POST['FName'];
			$LName = $_POST['LName'];
			$Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
			$DoB = $_POST['DoB'];
			$Gender = $_POST['Gender'];
			$Address = $_POST['Address'];
			$State = $_POST['State'];
			$Email = $_POST['Email'];

			$stmt->execute();
			
			echo "Registration Successful";
			header( "refresh:3;url=index.php" );

			?>
			
		</div>
	</body>
	
	<footer>
	<div id="footer">
			
		<p>&copy; Copyright of J-Hobby shop is only reserved for J-Hobby shop</p>

	</div>
</footer>
</html>
