<DOCTYPE!>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>Report Generation</Title>

</head>
<body>

<div class="top">
	<img></img>Welcome, &lt;User&gt; <!--Have php check if used is logged in-->
	<img></img>&lt;Date&gt; <!--Use .js get today's date -->
	<img></img>&lt;Log Out&gt; <!--function required-->
</div>
<?php 
	include 'divside.php';
	$dbServer='localhost';
	$dbUserName = 'root';
	$dbPassword = '';
	$dbName = 'srsphp';
	$dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);
	@mysql_select_db($dbName,$dbConx);
	$date = date("Y-m-d");
	$name = "C:\\" . $date . ".csv";
	$location = (string)$name;
?>



	<h1> Report Generation </h1>
	<hr />
	<h2> Report By Date </h2>
	<table>
		<thead>
		<tr>
			<th> Customer Name: </th>
			<th> Date: </th>
			<th> Sales ID: </th>
			<th> Total Quantity </th>
			<th> Total Price </th>
			<th> Item/Quantity ---> </th>
		</tr>
		</thead>
		<tbody>
		
		<form action ="report.php" id = "form" method = "post" name ="form">
		<p> Generate from Date 1 until Date 2 </p>
		Date 1 <input id = "date1" name = "date1" placeholder ="Date 1" type = "date">
		Date 2 <input id = "date2" name = "date2" placeholder ="Date 2" type = "date">
		&nbsp; <input type = "submit" id="day" value = "Generate" name = "submit">
		<br> <br>
		Save As: <br>
		<input id = "location" name = "location" type = "text" value="<?php echo htmlentities($location);?>">
		&nbsp; <input type = "submit" id="exportday" value = "Export by Day" name = "exportday">
		&nbsp; <input type = "submit" id="exportall" value = "Export All" name = "exportall">
		<br><br>
		</form>
		
		
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		$dbServer='localhost';
		$dbUserName = 'root';
		$dbPassword = '';
		$dbName = 'srsphp';
		$dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);
		mysql_select_db($dbName,$dbConx);
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$sqlstr = "SELECT * FROM sales WHERE sales_date >= '$date1' AND sales_date <= '$date2'";
		$medata = mysql_query($sqlstr,$dbConx);
		$name = $date1 . " to " . $date2 . ".csv";
		$location = (string)$name;
		$ttlallquan = 0;
		$ttlallprice = 0;
		
		while($record = mysql_fetch_array($medata))
		{
				echo "<tr><td>".$record['sales_name']."</td>";
				echo "<td>".$record['sales_date']."</td>";
				echo "<td>".$record['sales_id']."</td>";
				
				$ttlquan = 0;
				$ttlprice = 0;
				
				$sqlitem = "SELECT * FROM sold WHERE cust_id =".$record['sales_id'];
				$datatwo = mysql_query($sqlitem,$dbConx);
				while($recorditem = mysql_fetch_array($datatwo))
				{	
					
					$slditm = $recorditem['sold_item'];
					$sldquan = $recorditem['sold_itemquan'];
					$sql = "SELECT * FROM item WHERE item_name = '$slditm'";
					$datathree = mysql_query($sql,$dbConx);
					$datree = mysql_fetch_array($datathree);
					
					$itmprice = $datree['item_price'];
					
					$ttlprice = $ttlprice + ($itmprice*$sldquan);
					$ttlquan = $ttlquan + $sldquan;
					
				}
				echo "<td>".$ttlquan."</td>";
				echo "<td>".$ttlprice."</td>";
				$sqlitem = "SELECT * FROM sold WHERE cust_id =".$record['sales_id'];
				$datatwo = mysql_query($sqlitem,$dbConx);
				while($recorditem = mysql_fetch_array($datatwo))
				{	
					
					echo "<td>".$recorditem['sold_item']."</td>";
					echo "<td>".$recorditem['sold_itemquan']."</td>";
					
				}
				echo "</tr>";
			$ttlallquan = $ttlallquan + $ttlquan;
			$ttlallprice = $ttlallprice + $ttlprice;
		}
		
		echo "<h3>Total Quantity of Items Sold Within The Date: ".$ttlallquan."</h3><h3>".
		"Total Price of Sold Item: ".$ttlallprice."</h3>";
		
		}
		?>
		<?php
		if(isset( $_REQUEST['exportday']))
		{
			$location = str_replace("\\", "/", $name);
			
			if (file_exists($location)) {
				unlink($location);
				echo 'Existing file overwritten';
			}
			$result = mysql_query("
			SELECT s.sales_name, s.sales_date, s.sales_id, ss.sold_item, ss.sold_itemquan
			FROM sales s
			LEFT JOIN sold ss ON s.sales_id = ss.cust_id
			WHERE s.sales_date >= '$date1' AND s.sales_date <= '$date2'
			
			INTO OUTFILE '$location'
			FIELDS TERMINATED BY ','
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\r\n'
			");
			
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}
			else {
				echo "Report generated in" . $location . "<br>";
			}
		}
		else if(isset( $_REQUEST['exportall'] )) {
	
			$location = str_replace("\\", "/", $name);
			
			if (file_exists($location)) {
				unlink($location);
				echo 'Existing file overwritten';
			}
			
			$result = mysql_query("
			SELECT s.sales_name, s.sales_date, s.sales_id, ss.sold_item, ss.sold_itemquan
			FROM sales s
			LEFT JOIN sold ss ON s.sales_id = ss.cust_id
			
			INTO OUTFILE '$location'
			FIELDS TERMINATED BY ','
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\r\n'
			");
			
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}
			else {
				"Report generated in" . $location . "<br>";
			}
		}
		?>
		
		</tbody>
		</table>
	<br><br>
	<h2> All Daily Report </h2>
	<table>
	<thead>
		<tr>
			<th> Customer Name: </th>
			<th> Date: </th>
			<th> Sales ID: </th>
			<th> Total Quantity </th>
			<th> Total Price </th>
			<th> Item/Quantity ---> </th>
		</tr>
	</thead>
	<tbody>
		<?php
		$dbServer='localhost';
		$dbUserName = 'root';
		$dbPassword = '';
		$dbName = 'srsphp';
		$dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);
		mysql_select_db($dbName,$dbConx);
		$sqlstr = "SELECT * FROM sales";
		$medata = mysql_query($sqlstr,$dbConx);
		while($record = mysql_fetch_array($medata))
		{
				echo "<tr><td>".$record['sales_name']."</td>";
				echo "<td>".$record['sales_date']."</td>";
				echo "<td>".$record['sales_id']."</td>";
				
				$ttlquan = 0;
				$ttlprice = 0;
				$sqlitem = "SELECT * FROM sold WHERE cust_id =".$record['sales_id'];
				$datatwo = mysql_query($sqlitem,$dbConx);
				while($recorditem = mysql_fetch_array($datatwo))
				{	
					
					$slditm = $recorditem['sold_item'];
					$sldquan = $recorditem['sold_itemquan'];
					$sql = "SELECT * FROM item WHERE item_name =" .$slditm;
					$datathree = @mysql_query($sql,$dbConx);
					$datree = @mysql_fetch_array($datathree);
					
					$itmprice = $datree['item_price'];
					
					$ttlprice = $ttlprice + ($itmprice*$sldquan);
					$ttlquan = $ttlquan + $sldquan;
					
				}
				echo "<td>".$ttlquan."</td>";
				echo "<td>".$ttlprice."</td>";
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
	</tbody>
	</table>
<div class="btm">
 &lt; Footer &gt; <!--Change to include student IDs?-->
</div>
</body>
</html>
