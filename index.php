<html>
<head>  
<Title>Prakticni</Title>  
</head>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
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
  
}
div.submitWrapper  {
   text-align: center;    
}    

table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid black;
}

td {
  text-align: left;
  padding: 8px;
  border: 1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
  padding: 8px;
  border: 1px solid black;
}
</style>


<body>  
<div>
<form method="post" action="?action=add" > 
<label for="rednibroj">REDNI BROJ:</label></br>
<input type="text" name="t_rednib" id="t_rednib" placeholder="Redni Broj"></br>
<label for="ime">IME:</label></br>
<input type="text" name="t_ime" id="t_ime" placeholder="Ime"> </br>
<label for="prezime">PREZIME:</label></br>
<input type="text" name="t_prezime" id="t_prezime" placeholder="Prezime"></br>
<div class='submitWrapper'> 
<input type="submit" name="submit" value="UNESI" /></div> 
</form> 
</div> 
<?php  

$serverName = "tcp:servermirko56.database.windows.net,1433";  
$connectionOptions = array("Database" => "mirko56database","UID" => "mirkoazure","PWD" => "XXXXXXXXXXX");  
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

$sql = "SELECT * FROM tabela ORDER BY RB"; 
$stmt = sqlsrv_query($conn, $sql); 
if($stmt === false) 
{ 
die(print_r(sqlsrv_errors(), true)); 
} 
 
if(sqlsrv_has_rows($stmt)) 
{ 
print("<table>"); 
print("<tr>"); 
print("<th>REDNI BROJ</th>"); 
print("<th>IME</th>"); 
print("<th>PREZIME</th>"); 
print("</tr>");
 
while($row = sqlsrv_fetch_array($stmt)) 
{ 
print("<tr>"); 
print("<td>".$row['RB']."</td>"); 
print("<td>".$row['IME']."</td>"); 
print("<td>".$row['PREZIME']."</td>"); 
print("</tr>");
} 
 
print("</table>"); 
}



?>  
</body>  
</html>  
