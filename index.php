<html><head><Title>Primer Azure SQL Databaze sa PHP web stranom</Title></head><body>  
<?php      
$serverName = "tcp:servermirko55.database.windows.net,1433";  
$connectionOptions = array("Database" => "mirko55database","UID" => "mirkofuckazure","PWD" => "Mirko1234567*");  
$conn = sqlsrv_connect($serverName, $connectionOptions); 




	 
	echo "New record created successfully !";




    
?></body></html>