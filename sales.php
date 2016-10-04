<DOCTYPE!>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>Sales Module</Title>

<script>
function check_empty()
{
	if (document.getElementById('name').value == "" || document.getElementById('email').value == ""||
	document.getElementById('msg').value =="")
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
		<li><a href="sale.php">Sales</a></li>
		<li><a href="item.php">Inventory</a></li>
		<li><a href="item.php">Customers</a></li>
		<li><a href="item.php">Suppliers</a></li>
		<li><a href="item.php">Sales Report</a></li>
		<li><a href="#" class="last">Contact</a></li>
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
 <input id = "item" name = "item" placeholder = "item" type ="text">
 <a href = "javascript:%20check_empty()" id = "submit" class ="add"> Save </a>
 </form>
 </div>
</div>
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
	<button type="button" class="add" id="popup" onclick = "div_show()"> Add new sale </button> <!--Add Javascript here to open a popup window addsales.php->
	<button class="view"> View selected transaction </button> <!--Add Javascript here to add more items-->
</div>
<div class="btm">
 &lt; Footer &gt; <!--Change to include student IDs?-->
</div>
</body>
</html>
