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
		<?php if($_SESSION['AdminCheck'] != 1): ?>
		<div class="main">
		<div class="new">
		Must Be Admin to View This Page, Returning to Login...
		<?php 
			header( "refresh:3;url=login.php" ); 
		?>
		</div>
		</div>
		<?php else : ?>
			<h1>
			<?php
			$pdo = new PDO('mysql:host=localhost:3306;dbname=JHobby', 'root', '');
			$statement = $pdo->prepare("SELECT * FROM users WHERE UserName = :username ");
			$statement->bindValue(':username', $_POST['UserName']);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);			
			
			
			
			if ($row['UserName'] == $_POST['UserName']){
				$stmt = $pdo->prepare("UPDATE users SET AdminCheck = :AdminCheck, FName = :FName, LName = :LName, Password = :Password, 
					Address = :Address , State = :State, Email = :Email WHERE UserName = :UserName ");
				$stmt->bindParam(':UserName', $UserName);	
				$stmt->bindParam(':AdminCheck', $AdminCheck);
				$stmt->bindParam(':FName', $FName);
				$stmt->bindParam(':LName', $LName);
				$stmt->bindParam(':Password', $Password);
				$stmt->bindParam(':Address', $Address);
				$stmt->bindParam(':State', $State);
				$stmt->bindParam(':Email', $Email);
				
				$UserName = $_POST['UserName'];
				
				if ($_POST['AdminCheck']){
					$AdminCheck = $_POST['AdminCheck'];
					echo "AdminCheck Changed";					
				}
				if ($_POST['FName']){
					$FName = $_POST['FName'];
					echo "FName Changed";
				}
				if ($_POST['LName']){
					$LName = $_POST['LName'];
					echo "LName Changed";
				}
				if ($_POST['Password']){
					$Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
					echo "Password Changed";
				}
				if ($_POST['Address']){
					$Address = $_POST['Address'];
					echo "Address Changed";
				}
				if ($_POST['State']){
					$State = $_POST['State'];
					echo "State Changed";
				}
				if ($_POST['Email']){
					$Email = $_POST['Email'];
					echo "Email Changed";
				}
				$stmt->execute();
				header( "refresh:5;url=Users.php" );
				
			} else{
				echo "UserName Does Not Exist!";
				header( "refresh:3;url=EditUser.php" );
			}						

			?>
			</h1>
		<?php endif; ?>

			
		</div>
	</body>
	
	<footer>
	<div id="footer">
			
		<p>&copy; Copyright of J-Hobby shop is only reserved for J-Hobby shop</p>

	</div>
</footer>
</html>
