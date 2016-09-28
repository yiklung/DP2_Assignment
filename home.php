<!DOCTYPE>

<?php 

$dbServer='localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'srsphp';

$dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);

//creating Database if database not exist 

	if (mysql_select_db($dbName) == false)
	{
		$strSql = "CREATE DATABASE $dbName"; 
		//mysql command to create database of this name
		$queryResult = @mysql_query($strSql,$dbConx);
		
		if ($queryResult == true)
		{
		//if the query done successfully
		 echo "<p>Database '$dbName' successfully created</p>";
		 mysql_select_db($dbName);
		 
		 //Table creation after database created
		 $tableName = 'item';
		 $strSql = "SHOW TABLES LIKES '$tableName' ";
		 $queryResult = @mysql_query($dbConx, $strSql); 
		 //To see if the table existed in system, if not, create the table 
		 
			if(@mysql_num_rows($queryResult) == NULL)
			{
				$strSql = "CREATE TABLE $tableName (item_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				item_name VARCHAR(50) NOT NULL, item_price INT NOT NULL,
				item_stock INT NOT NULL)";
				$queryResult = @mysql_query($strSql, $dbConx);
				//created item stock table
				//make the item id change to 1000 increase by 1 everytime
				
				
				if($queryResult)
				{
					echo "<p>Table successfully created </p>";
					$strSql = "ALTER TABLE item AUTO_INCREMENT = 1000";
					$queryResult = @mysql_query ($strSql, $dbConx);
					if($queryResult)
					{
						echo "<p> Successfully alter increment </p>";
					}
					else
					{
						echo "<p> error in altering </p>";
					}
				}
				else
				{
					echo "<p>unable to create table</p>";
				}
				
			}
			 else
			{
				echo "<p> Table already exist </p>";
			}
		 //Sales table creation 
		 mysql_select_db($dbName);
		 $tableName = 'sales';
		 $strSql = "SHOW TABLES LIKES '$tableName' ";
		 $dbConx = @mysql_connect($dbServer,$dbUserName,$dbPassword);
		 $queryResult = @mysql_query($dbConx, $strSql); 
		 //To see if the table existed in system, if not, create the table 
		 
			if(@mysql_num_rows($queryResult) == NULL)
			{
				$strSql = "CREATE TABLE $tableName (sales_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				sales_name VARCHAR(50) NOT NULL, sales_date VARCHAR(50) NOT NULL,
				sales_item1 VARCHAR(50),sales_item1quan INT, sales_item2 VARCHAR(50), sales_item2quan INT,
				sales_item3 VARCHAR(50), sales_item3quan INT, sales_item4 VARCHAR(50), sales_item4quan INT,
				sales_item5 VARCHAR(50), sales_item5quan INT)";
				$queryResult = @mysql_query($strSql, $dbConx);
				//created item stock table
				//make the item id change to 1000 increase by 1 everytime
				
				
				if($queryResult)
				{
					echo "<p>Table successfully created </p>";
					$strSql = "ALTER TABLE sales AUTO_INCREMENT = 1000";
					$queryResult = @mysql_query ($strSql, $dbConx);
					if($queryResult)
					{
						echo "<p> Successfully alter increment </p>";
					}
					else
					{
						echo "<p> error in altering </p>";
					}
				}
				else
				{
					echo "<p>Unable to create table. Error Code ".
						mysql_errno().":".mysql_error()."</p>";
				}
				
			}
			 else
			{
				echo "<p> Table already exist </p>";
			}
		 
		 
		 
		 
		 
		}
		else
		{
			echo "<p>Unable to connect to the database server.<br /> Error Code "
			. mysql_errno().":". mysql_error()."</p>"; 
		}
		
		
	}
	else
	{
		echo "<p>Database Ready". mysql_errno().":". mysql_error()."</p>";
	}

	//if unable to connect 
	
		if (mysql_connect() == false )
	{
		echo "<p>Unable to connect to the database server.<br /> Error Code "
		. mysql_errno().":". mysql_error()."</p>";
	}
	else
	{
		
	}
	
//close connection after use
	
	mysql_close($dbConx);



?>

<html>
<title>PHP SRS System</title>
<head>
</head>
<header>
</header>
<body>
<p> hi this is php srs system </p>
</body>
</html>