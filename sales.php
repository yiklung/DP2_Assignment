﻿<DOCTYPE!>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>Sales Module</Title>

<script>
function check_empty()
{
	if (document.getElementById('name').value == "" || document.getElementById('date').value == "")
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
		<li><a href ="report.php">Report</a></li>
		<li><a href="supply.php">Suppliers</a></li>
		<li><a href="contact.php" class="last">Contact</a></li>
	</ul>
</div>
<div class="body2"> 
<div id = "poppy">
 <div id ="popupContact">
 <form class ="form2" action ="sales.php" id = "form" method = "post" name = "form">
 <button  type ="button" class ="add" id = "close" onclick = "div_hide()">Close</button>
 <h2 class = "addsalestitle">Add Sales </h2>
 <hr>
 <input id = "name" name ="name" placeholder ="Name" type = "text">
 <input id = "date" name ="date" placeholder = "Date" type ="date">
 
 <div id = "dynamicInput">
<?php
$dbServer='localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'srsphp';
$dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);
mysql_select_db($dbName,$dbConx);

$sqlstr = "SELECT item_name FROM item";
$medata = mysql_query($sqlstr,$dbConx);

echo "<table><tr class ='itemchoose'><td class ='itemchoose'>Item 1 <select class = 'selectname' name ='select' id= 'select'>";
$option='';
while($rs = mysql_fetch_array($medata))
	{
		$option.='<option value ="'.$rs["item_name"].'">'.$rs["item_name"].'</option>';
	}
	$option.='</select></td><td class ="itemchoose">';
	$option2 ='Quantity<select class ="valuenum" name ="value" id="value">';
	$option3='<option value ="1">1</option><option value ="2">2</option><option value ="3">3</option><option value ="4">4</option><option value ="5">5</option></select></td></tr></table>';
echo $option;
echo $option2;
echo $option3;


 ?>
 </div>
 
 <script>
 var counter = 1;
 var limit = 10;
 var js_data= '<?php echo $option; ?>';
 var js_data2 = '<?php echo $option3;?>';
 
 function addInput(divName){
		if (counter == limit)
		{
			alert("Maximum Item Per Cart");
		}
		else
		{
			var newdiv = document.createElement('div');
			newdiv.innerHTML = '<table><tr class ="itemchoose"><td class ="itemchoose">Item ' + (counter+1)+' <select class = "selectname" name="select'+(counter+1)+'" id="select'+(counter+1)+'">'+js_data+'Quantity<select class ="valuenum" name ="value'+(counter+1)+'" id="value'+(counter+1)+'">'+js_data2;
			document.getElementById(divName).appendChild(newdiv);
			counter++;
		}
	}

 </script>
 
 
 <input type = "button" value = "Add Item" onClick ="addInput('dynamicInput');">
 <a href="javascript:%20check_empty()" id = "submitadd" name = "submitadd" class ="add"> Save </a>
 </form>
 </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$name = $_POST["name"];
	$date = $_POST["date"];
	
	$sqlstr = "INSERT INTO sales(sales_name,sales_date) VALUES
	('$name','$date')";
	mysql_query($sqlstr,$dbConx);
	
	$sqlstr = "SELECT sales_id FROM sales ORDER BY id LIMIT 1";
	$medata = mysql_query($sqlstr,$dbConx);
	
	$solditem = $_POST["select"];
	$soldquan = $_POST["value"];
	
	$sqlstr = "INSERT INTO sold (cust_id,sold_item,sold_itemquan)
	VALUES ((SELECT sales_id FROM sales WHERE sales_name ='$name' AND sales_date='$date'),'$solditem','$soldquan')";
	mysql_query($sqlstr,$dbConx);
	
	$sqlstr = "UPDATE item SET item_stock = item_stock - '$soldquan' 
	WHERE item_name = '$solditem'";
	mysql_query($sqlstr,$dbConx);
	
	$x=2;
	while($x<=10)
	{   
        
		@$solditem2 = $_POST["select".$x.""];
		@$soldquan2 = $_POST["value".$x.""];
		if(isset($solditem2))
		{
		$sqlstr = "INSERT INTO sold (cust_id,sold_item,sold_itemquan)
		VALUES ((SELECT sales_id FROM sales WHERE sales_name ='$name' AND sales_date='$date'),'$solditem2','$soldquan2')";
		mysql_query($sqlstr,$dbConx);
		$sqlstr = "UPDATE item SET item_stock = item_stock - '$soldquan2' 
		WHERE item_name = '$solditem2'";
		mysql_query($sqlstr,$dbConx);
		}
		else{}
		$x++;
	}
	unset($_POST);
}
else
{
	
}
?>
	<h1> Sales </h1>
	<hr />
	<br><br>
	<table>
	<tr><td> Customer Name: </td>
	<td> Date: </td>
	<td> Sales ID: </td>
	<td> Item/Quantity ---> </td>
	</tr>
	
<?php
$sqlstr = "SELECT * FROM sales";
$medata = mysql_query($sqlstr,$dbConx);
while($record = mysql_fetch_array($medata))
{
		echo "<tr><td>".$record['sales_name']."</td>";
		echo "<td>".$record['sales_date']."</td>";
		echo "<td>".$record['sales_id']."</td>";
		$sqlitem = "SELECT * FROM sold WHERE cust_id =".$record['sales_id'];
		$datatwo = mysql_query($sqlitem,$dbConx);
		while($recorditem = mysql_fetch_array($datatwo))
		{	
			
			echo "<td>".$recorditem['sold_item']."</td>";
			echo "<td>".$recorditem['sold_itemquan']."</td>";
			
		}
		echo "</tr>";
}
?>
	</table>
	<br>
	<br>
	<button type="button" class="add" id="popup" onclick = "div_show()"> Add new sale </button> <!--Add Javascript here to open a popup window addsales.php-->
	<a href="modify.php" class="view">Modify Sales</a>
	
</div>
<div class="btm">
 &lt; Footer &gt; <!--Change to include student IDs?-->
</div>
</body>
</html>