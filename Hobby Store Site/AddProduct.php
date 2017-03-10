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
		<div class="main2">
		</div>
			<tr id= "navRow2">
				<div class="menuPartThree">
					<ul>
						<li><font color="white"></li>
						<li><a href="Orders.php"><font color="white">Orders</a></li>
						<li><a href="ProductCategory.php"><font color="white">P&C CRUD</a></li>			
						<li><a href="Users.php"><font color="white">Manage Users</a></li>
						<li><a href="AdminPanel.php"><font color="white">Admin Panel</a></li>
						</font>
					</ul>
				</div>
			</tr>
		<div class="main2">
		</div>
			<tr id= "navRow">
				<div class="menuPartTwo">
					<ul>
						<li><font color="white"></li>		
						<li><a href="AddProduct.php"><font color="white">Add Product</a></li>
						<li><a href="AddCategory.php"><font color="white">Add Category</a></li>
						</font>
					</ul>
				</div>
			</tr>
		<div class="main">
			
			
			<font color="black">
			<div class="registrationForm">
                <form name="myform" id="myform" action="AddProductCheck.php" method="post">
                <table>
				
				  <tr>
                    <td>Product Name*: </td><td><input type="text" name="ProductName" required /></td>
                  </tr>
				  
				  <tr>
                    <td>Category*: </td><td><select input type="text" name="Category" id="Category">
                    <option value="default" required/></option>
						<?php
						$pdo = new PDO('mysql:host=localhost:3306;dbname=JHobby', 'root', '');
						$statement = $pdo->prepare("SELECT Category FROM category");
						$statement->execute();

						while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
							echo '<option>'.$row['Category'].'</option>';
						}
						
						?>				
											
                    </select></td>
                  </tr>
				  
				  </tr>
                    <td>Stock*: </td><td><input type="int" name="Stock" required/></td>
                  </tr>				
				  
                  <tr>
                    <td>ItemImage1*: </td> <td><input type="text" name="ItemImage1" required /></td>
                  </tr>
				  
				  <tr>
                    <td>ItemImage2*: </td> <td><input type="text" name="ItemImage2" required /></td>
                  </tr>
				  
                  <tr>
                    <td>Cost*: </td><td><input type="text" name="Cost" required/></td>
                  </tr>
				  
				  <tr>
                    <td>Description*: </td><td><input type="text" name="Description" required/></td>
                  </tr>
				  
                  <tr>
                      <td colspan="2" style="text-align:center"><input type="submit" name="submit" value="Add Product" onclick="return validate()"></td>
                  </tr>
                </table>
                </form>
            </div>
			</font>
		</div>	   
    
	<?php endif; ?>



    
</body>

<footer>
	<div id="footer">
			
		<p>&copy; Copyright of J-Hobby shop is only reserved for J-Hobby shop</p>

	</div>
</footer>

</html>
