<html><head><Title>Primer Azure SQL Databaze sa PHP web stranicom</Title></head><body>  
<?php      
$serverName = "tcp:servermirko56.database.windows.net,1433";  
$connectionOptions = array("Database" => "mirko56database","UID" => "mirkoazure","PWD" => "Mirko1234567*");  
$conn = sqlsrv_connect($serverName, $connectionOptions); 

//FORM
<form method="post" action="?action=add">RB
<input type="text" name="t_RB"      id="t_RB"/>      </br>Ime
<input type="text" name="t_ime"     id="t_ime"/>     </br>Prezime
<input type="text" name="t_prezime" id="t_prezime"/> </br>  
<input type="submit" name="submit" value="Submit" /></form> 
  
//INSERT
if (isset($_GET['action'])){if ($_GET['action'] == 'add'){  
$insertSql = "INSERT INTO tabela (RB,ime,prezime) VALUES (?,?,?)";  
$params = array(&$_POST['t_RB'], &$_POST['t_ime'], &$_POST['t_prezime']);  
$stmt = sqlsrv_query($conn, $insertSql, $params);}}  
  
//DISPLAY 
$sql = "SELECT * FROM tabela ORDER BY name"; 
$stmt = sqlsrv_query($conn, $sql); 
 
if(sqlsrv_has_rows($stmt)){ /////////////////////////////
print("<table border='1px'>"); ////
print("<tr><td>Emp Id</td>"); ///
print("<td>Name</td>"); ////
print("<td>prezime</td>"); ///////////////////////////////
 
while($row = sqlsrv_fetch_array($stmt)){ 
print("<tr><td>".$row['RB']."</td>"); 
print("<td>".$row['ime']."</td>"); 
print("<td>".$row['prezime']."</td>");} 
print("</table>");} //////////////////////////////////

?></body></html>