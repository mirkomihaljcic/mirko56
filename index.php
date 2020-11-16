

<html>  
<head>  
<Title>Azure SQL Database - PHP Website</Title>  
</head>  
<body>  
<form method="post" action="?action=add" enctype="multipart/form-data" >  
RB <input type="text" name="t_RB" id="t_RB"/></br>  
IME <input type="text" name="t_IME" id="t_IME"/></br>  
PREZIME <input type="text" name="t_PREZIME" id="t_PREZIME"/></br>  

<input type="submit" name="submit" value="Submit" />  
</form>  
<?php  



$serverName = "tcp:servermirko56.database.windows.net,1433";  
$connectionOptions = array("Database" => "mirko56database","UID" => "mirkoazure","PWD" => "Mirko1234567*");  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
 
if (isset($_GET['action']))  
{  
if ($_GET['action'] == 'add')  
    {  
     
    }  
}  



?>  
</body>  
</html>  
