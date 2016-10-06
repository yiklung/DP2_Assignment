<DOCTYPE!>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>Inventory</Title>
<script>
function check_empty()
{
	if (document.getElementById('name').value == "" || document.getElementById('stock').value == "")
	{
		alert ("Fill All Fields");
	}
	else
	{
		document.getElementById('form').submit();
		alert("Form Submitted Successfully");
	}
}

function div_show()
{
	document.getElementById('poppy').style.display = "block";
}
function div_hide()
{
	document.getElementById('poppy').style.display = "none";
}

 </script>
</head>
<body>

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
		<li><a href="supply.php">Suppliers</a></li>
		<li><a href="contact.php" class="last">Contact</a></li>
	</ul>
</div>
<div class="body2"> 
<h1> Inventory </h1>
	<hr />
	<br><br>
	<table>
	<tr><td> Item Name: </td>
	<td> Item Quantity: </td>
	<td> Item Price: </td>
	<td> Item ID </td>
	</tr>
	
<?php
$dbServer='localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'srsphp';
$dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);
mysql_select_db($dbName,$dbConx);
$sqlstr = "SELECT * FROM item";
$medata = mysql_query($sqlstr,$dbConx);
while($record = mysql_fetch_array($medata))
{
		echo "<tr><td>".$record['item_name']."</td>";
		echo "<td>".$record['item_stock']."</td>";
		echo "<td>".$record['item_price']."</td>";
		echo "<td>".$record['item_id']."</td>";
		
		echo "</tr>";
}
?>
	</table>
	<br>
	<br>
	<button type="button" class="add" id="popup" onclick = "div_show()"> Add new item </button> <!--Add Javascript here to open a popup window addsales.php-->
	<a href="modifyitem.php" class="view">Modify item</a>
</div>

<div id = "poppy">
 <div id ="popupContact">
 <form class ="form2" action ="item.php" id = "form" method = "post" name = "form">
 <button  type ="button" class ="add" id = "close" onclick = "div_hide()">Close</button>
 <h2 class = "addsalestitle">Add Item </h2>
 <hr>
 <input id = "name" name ="name" placeholder ="Item Name" type = "text">
 <input id = "stock" name ="stock" placeholder = "Stock" type ="number">
 <input id = "price" name ="price" placeholder = "Price" type ="number">
 <a href="javascript:%20check_empty()" id = "submitadd" name = "submitadd" class ="add"> Save </a>
 </form>
 </div>
</div>
<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$name = $_POST["name"];
	$stock = $_POST["stock"];
	$price = $_POST["price"];
	
	$sqlstr = "INSERT INTO item(item_name,item_stock,item_price) VALUES
	('$name','$stock','$price')";
	mysql_query($sqlstr,$dbConx);
	unset($_POST);
	header('Location: item.php');
}
else
{
	
}


?>
<div class="btm">
 &lt; Footer &gt; <!--Change to include student IDs?-->
</div>
</body>
</html>