<DOCTYPE!>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>Home</Title>

</head>
<body>
<?php
	include 'databasecreate.php';
?>
<div class="top">
	<img></img>Welcome, please <a href="#">login</a>. <!--Have php check if used is logged in-->
	<img></img>&lt;Date&gt; <!--Use .js get today's date -->
</div>
<div class="side">
	<ul id="side">
		<li><a href="home.php">Home</a></li>
		<li><a href="sales.php">Sales</a></li>
		<li><a href="item.php">Inventory</a></li>
		<li><a href="item.php">Customers</a></li>
		<li><a href="item.php">Suppliers</a></li>
		<li><a href="item.php">Sales Report</a></li>
		<li><a href="#" class="last">Contact</a></li>
	</ul>
</div>
<div class="body2"> 

	<h1> Login </h1>
	<hr />
	<br><br>
	
	<form>
	  Username:<br>
	  <input type="text" name="">
	  <br><br>
	  Password:<br>
	  <input type="text" name="">
	  <br><br>
	<input type="submit" value="Login" class="submit">
	</form>
		
</div>

<div class="btm">
 &lt; Footer &gt; <!--Change to include student IDs?-->	
</div>
</body>
</html>
