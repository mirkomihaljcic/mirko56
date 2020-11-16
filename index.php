<html>
<head>  
<Title>Prakticni</Title>  
</head>

<style>
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  position: absolute;
        top: 50%;
        left: 50%;      
        transform: translate(-50%, -50%)
}
</style>


<body>  
<div>
<form method="post" action="?action=add" > 
<label for="rednibroj">Redni Broj:</label></br>
<input type="text" name="t_rednib" id="t_rednib" placeholder="Redni Broj"></br>
<label for="ime">Ime:</label></br>
<input type="text" name="t_ime" id="t_ime" placeholder="Ime"> </br>
<label for="prezime">Prezime:</label></br>
<input type="text" name="t_prezime" id="t_prezime" placeholder="Prezime"></br>
<input type="submit" name="submit" value="Unesi" />  
</form> 
</div> 
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
