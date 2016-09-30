<DOCTYPE!>
<html>
<title>PHP SRS System</title>
<head>
<link rel = "stylesheet" type = "text/css" href = "format.css">
</head>
<header>
<h1 class = "links"><a class = "baton" href = "home.php"> Home Page </a> </h1>
<h1 class = "links"><a class = "baton" href = "salesview.php"> View Sales </a> </h1>
<h1 class = "links"><a class = "baton" href = "itemview.php"> View Items </a> </h1>
</header>
<body>
<p> Item Stock List </p>



<form action = "itemview.php" method = "post">
<h2 class = "but1"><input class = "baton2" type = "submit" name = "listall" value = "List All"></h1>
</form>	

</body>
</html>
<?php
$dbServer='localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'srsphp';

$dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);
mysql_select_db($dbName,$dbConx);


if (isset ($_POST['listall']))
{
	$sqlstr = "SELECT * FROM item";
	$medata = mysql_query($sqlstr,$dbConx);
	
	while($record = mysql_fetch_array($medata))
	{
		echo"<table>";
		echo"<tr>";
		echo"<td>"."<label> Item ID: </label>"."</td>";
		echo "<td>". "<input type = text name = itemid value =".$record['item_id']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item Name: </label>"."</td>";
		echo "<td>". "<input type = text name = itemname value =".$record['item_name']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item Price: </label>"."</td>";
		echo "<td>". "<input type = text name = itemprice value =".$record['item_price']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item Stock: </label>"."</td>";
		echo "<td>". "<input type = text name = itemstock value =".$record['item_stock']."></td>";
		echo "</tr>";
		
		
		echo "</table>";
	}
}
else
{
	//non
}


?>