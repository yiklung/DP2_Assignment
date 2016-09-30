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
<p> Sales Records View </p>

<form action = "salesview.php" method = "post">
<table>
<tr>
<td> Month:</td>
<td><input type = "text" name = "month" placeholder ="Insert Month Number"></input></td>
</tr>
<tr>
<td> Week:</td>
<td><input type = "text" name = "week" placeholder ="Insert Week Number"></input></td>
</tr>
<tr>
<td>
<input class = "baton2" type = "submit" name = "listmonth" value = "List Month">
</td>
<td>
<input class = "baton2" type = "submit" name = "listweek" value = "List Month/Week">
</td>
</tr>
</form>

<form action = "salesview.php" method = "post">
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
	$sqlstr = "SELECT * FROM sales";
	$medata = mysql_query($sqlstr,$dbConx);
	
	while($record = mysql_fetch_array($medata))
	{
		echo"<table>";
		echo"<tr>";
		echo"<td>"."<label> Sales ID: </label>"."</td>";
		echo "<td>". "<input type = text name = salesid value =".$record['sales_id']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Customer Name: </label>"."</td>";
		echo "<td>". "<input type = text name = salesname value =".$record['sales_name']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item 1: </label>"."</td>";
		echo "<td>". "<input type = text name = item1 value =".$record['sales_item1']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item 2: </label>"."</td>";
		echo "<td>". "<input type = text name = item2 value =".$record['sales_item2']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item 3: </label>"."</td>";
		echo "<td>". "<input type = text name = item3 value =".$record['sales_item3']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item 4: </label>"."</td>";
		echo "<td>". "<input type = text name = item4 value =".$record['sales_item4']."></td>";
		echo "</tr>";
		
		echo"<tr>";
		echo"<td>"."<label> Item 5: </label>"."</td>";
		echo "<td>". "<input type = text name = item5 value =".$record['sales_item5']."></td>";
		echo "</tr>";
		
		echo "</table>";
	}
}
else
{
	//non
}


?>