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

		
		<div class="main3">
			<font color="black">
			<h2>
			Shipping Address
			<br>
				<?php
					$pdo = new PDO('mysql:host=localhost:3306;dbname=JHobby', 'root', '');
					$statement = $pdo->prepare("SELECT FName, LName, Address, State, Email  FROM users WHERE UserName = :username ");
					$statement->bindValue(':username', $_SESSION['Name']);
					$statement->execute();
					$row = $statement->fetch(PDO::FETCH_ASSOC);		

					echo "<table>";
					echo "<tr>";
						foreach ($row as $column => $data) {
							echo "<td class= 'cart'>" . $data . "</td>";
						}
						echo "</tr>";
					echo "</table>";
				?>
			</h2>
			</font>
		</div>	

		<div class="new">
			<table>
				
				<?php
					$pdo = new PDO('mysql:host=localhost:3306;dbname=JHobby', 'root', '');
					$statement = $pdo->query("SELECT * FROM cart");
					$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

					echo "<table>";
					
					echo "<tr>";
					foreach ($rows[0] as $column => $data){
						echo "<td class= 'cart'>" . $column . "</td>";
					}
					echo "</tr>";
					
					foreach ($rows as $row) {
						echo "<tr>";
						foreach ($row as $column => $data) {
							echo "<td class= 'cart'>" . $data . "</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				?>
				
			</div>
				
			</table>
			
			<table>
				<tr class= "Total">
					<h1>
					Grand Total:
					</h1>
				</tr>
			</table>
			
			<table>
			
				<tr class= "Total">
					<a href="Payment.php"><img src="Continue.png" width="200" height="100"></a>
				</tr>
				
				
			</table>		
		</table>
   



    
</body>

<footer>
	<div id="footer">
			
		<p>&copy; Copyright of J-Hobby shop is only reserved for J-Hobby shop</p>

	</div>
</footer>

</html>
