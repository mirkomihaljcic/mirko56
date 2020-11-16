<html><head><Title>Primer Azure SQL Databaze sa PHP web stranom</Title></head><body>  
<form method="post" action="?action=add">  
RB      <input type="text" name="t_rb"      id="t_rb"/></br>  
IME     <input type="text" name="t_ime"     id="t_ime"/></br>  
PREZIME <input type="text" name="t_prezime" id="t_prezime"/></br>  
<input type="submit" name="submit" value="Submit"/></form>  
<?php      
$serverName = "tcp:servermirko55.database.windows.net,1433";  
$connectionOptions = array("Database" => "mirko55database","UID" => "mirkofuckazure","PWD" => "Mirko1234567*");  
$conn = sqlsrv_connect($serverName, $connectionOptions); 




	 
	echo "New record created successfully !";





?></body></html>