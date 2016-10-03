<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<Title>Add Sales</Title>
</head>
<body>

<script> <!--Modify script to include items sold. Place in separate .js file in future, close both popups-->
function myFunction() {
    var myWindow = window.open("Success", "MsgWindow", "width=200,height=100");
    myWindow.document.write("<p>You have successfully added the transaction.</p>");
}
</script>

<form action = "salesview.php" method = "post">
<h2 class = "but1"><input class = "baton2" type = "submit" name = "listall" value = "List All"></h1>
</form>	
	<h1> Add new sales transaction </h1>
	<hr />
	<form action="sale.php" method="get" name="login" onsubmit="myFunction(); return false;">
	  Customer Name:<br>
	  <input type="text" name="">
	  <br><br>
	  Date:<br>
	  <input type="date" name="">
	  <br><br>
	  Item 1: 
		<select>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		</select>
	  <button class="add"> Add more </button> <!--Add Javascript here to add more items-->
	  <br><br>
	  <input type="submit" value="Add Sales" class="submit">
	</form>
</body>
</html>