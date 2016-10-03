<DOCTYPE!>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>Sales Module</Title>
</head>
<body>

<div class="top">
	<img></img>Welcome, &lt;User&gt; <!--Have php check if used is logged in-->
	<img></img>&lt;Date&gt; <!--Use .js get today's date -->
	<img></img>&lt;Log Out&gt; <!--function required-->
</div>
<div class="side">
	<ul id="side">
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="sale.php">Sales</a></li>
		<li><a href="item.php">Inventory</a></li>
		<li><a href="item.php">Customers</a></li>
		<li><a href="item.php">Suppliers</a></li>
		<li><a href="item.php">Sales Report</a></li>
		<li><a href="#" class="last">Contact</a></li>
	</ul>
</div>
<div class="Body"> 
	<h1> Sales </h1>
	<hr />
	<br><br>
	<table>
		<tr>
			<th> Customer Name </th>
			<th> Date </th>
			<th> Sales ID </th>
		</tr>
		<tr> <!--Append database data, need to modify to allow for selecting-->
			<td>ENTER CUSTOMER NAME HERE</td>
			<td>ENTER DATE HERE</td>
			<td>SALES ID</td>
		</tr>	
	</table>
	<br>
	<br>
	<button class="add"> Add new sale </button> <!--Add Javascript here to open a popup window addsales.php->
	<button class="view"> View selected transaction </button> <!--Add Javascript here to add more items-->
</div>
<div class="btm">
 &lt; Footer &gt; <!--Change to include student IDs?-->
</div>
</body>
</html>
