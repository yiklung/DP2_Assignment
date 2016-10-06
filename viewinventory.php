<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>View / Modify Inventory</Title>
</head>
<body>

<script> <!--Modify script to include items sold. Place in separate .js file in future, close both popups-->
function myFunction() {
    var myWindow = window.open("Success", "MsgWindow", "width=200,height=100");
    myWindow.document.write("<p>You have successfully added the transaction.</p>");
}
</script>

<form action = "salesview.php" method = "post">
</form>	
	<h1> View / Modify Items </h1>
	<hr />
	<form action="sale.php" method="get" name="login" onsubmit="myFunction(); return false;">
		<br>
		Item Name:<br>
		<input type="text" name="">
		<br><br>
		Quantity:<br>
		<input type="date" name="">
		<br><br>
		Price: <br>
		<input type="date" name="">
		<br><br>
		Supplier: <br>
		<select>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		</select>
		<input type="submit" value="Add Item" class="submit">
		<button class="delete"> Delete </button> <!--Add Javascript here to confirm deletion-->
		<a href="inventory.php" class="cancel"> Cancel </a>
	  <br><br>
	</form>
</body>
</html>