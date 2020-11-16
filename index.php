

<html>  
<head>  
<Title>Azure SQL Database - PHP Website</Title>  
</head>  
<body>  
<form method="post" action="?action=add" enctype="multipart/form-data" >  
RB <input type="text" name="t_rednib" id="t_rednib"/></br>  
IME <input type="text" name="t_ime" id="t_ime"/></br>  
PREZIME <input type="text" name="t_prezime" id="t_prezime"/></br>  

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
      
    $insertSql = "INSERT INTO tabela (RB,IME,PREZIME) VALUES (?,?,?)";  
    $params = array(&$_POST['t_rednib'], &$_POST['t_ime'], &$_POST['t_prezime']); 
    $stmt = sqlsrv_query($conn, $insertSql, $params);  
 
       
    }  
}  



?>  
</body>  
</html>  
