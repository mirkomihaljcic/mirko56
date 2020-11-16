<html>
<head>  
<link rel="stylesheet" href="styles.css">
<Title>Prakticni</Title>  
</head>  
<body>  
<form method="post" action="?action=add" >  
Redni Broj: <input type="text" name="t_rednib" id="t_rednib"/></br>  
Ime: <input type="text" name="t_ime" id="t_ime"/></br>  
Prezime: <input type="text" name="t_prezime" id="t_prezime"/></br>  

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
/////////////////////////

$sql = "SELECT * FROM tabela ORDER BY RB"; 
$stmt = sqlsrv_query($conn, $sql); 
if($stmt === false) 
{ 
die(print_r(sqlsrv_errors(), true)); 
} 
 
if(sqlsrv_has_rows($stmt)) 
{ 
print("<table border='1px'>"); 
print("<tr><td>Redni Broj</td>"); 
print("<td>Ime</td>"); 
print("<td>Prezime</td>"); 
 
 
while($row = sqlsrv_fetch_array($stmt)) 
{ 
 
print("<tr><td>".$row['RB']."</td>"); 
print("<td>".$row['IME']."</td>"); 
print("<td>".$row['PREZIME']."</td>"); 
} 
 
print("</table>"); 
}



?>  
</body>  
</html>  
