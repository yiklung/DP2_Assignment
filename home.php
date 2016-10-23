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
	<img></img>Welcome, &lt;User&gt; <!--Have php check if used is logged in-->
	<img></img>&lt;Date&gt; <!--Use .js get today's date -->
	<img></img>&lt;Log Out&gt; <!--function required-->
</div>
<div class="side">
	<ul id="side">
		<li><a href="home.php">Home</a></li>
		<li><a href="sales.php">Sales</a></li>
		<li><a href="item.php">Inventory</a></li>
		<li><a href ="report.php">Report</a></li>
		<li><a href="supply.php">Suppliers</a></li>
		<li><a href="contact.php" class="last">Contact</a></li>
	</ul>
</div>
<div class="body2"> 
<h1> Welcome To People Health Pharmacy Sales Reporting System </h1>
<h2> Please ensure that Items are added into Inventory before adding sales record </h2>
<h3> Log in to use all the function </h3>
<br>

 Username : <input id = "username" name ="username" placeholder ="username" type = "text"><br>
 Passsword :<input id = "password" name ="password" placeholder = "password" type ="password"><br>
 <input id="submit" name = "submit" type = "submit">
</div>
<div class="btm">
 &lt; Footer &gt; <!--Change to include student IDs?-->
</div>
</body>
</html>
