

<html>  
<head>  
<Title>Azure SQL Database - PHP Website</Title>  
</head>  
<body>  
<form method="post" action="?action=add" enctype="multipart/form-data" >  
IME <input type="text" name="t_RB" id="t_RB"/></br>  
Name <input type="text" name="t_IME" id="t_IME"/></br>  
PREZIME <input type="text" name="t_PREZIME" id="t_PREZIME"/></br>  

<input type="submit" name="submit" value="Submit" />  
</form>  
<?php  


$serverName = "tcp:servermirko56.database.windows.net,1433";  
$connectionOptions = array("Database" => "mirko56database","UID" => "mirkoazure","PWD" => "Mirko1234567*");  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
  
if ($conn === false)  
    {  
    die(print_r(sqlsrv_errors() , true));  
    }  
  
if (isset($_GET['action']))  
    {  
    if ($_GET['action'] == 'add')  
        {  
        /*Insert data.*/  
        $insertSql = "INSERT INTO tabela (RB,IME,PREZIME)   
VALUES (?,?,?)";  
        $params = array(&$_POST['t_RB'], &$_POST['t_IME'], &$_POST['t_PREZIME']]  
        );  
        $stmt = sqlsrv_query($conn, $insertSql, $params);  
        if ($stmt === false)  
            {  
            /*Handle the case of a duplicte e-mail address.*/  
            $errors = sqlsrv_errors();  
            if ($errors[0]['code'] == 2601)  
                {  
                echo "The e-mail address you entered has already been used.</br>";  
                }  
  
            /*Die if other errors occurred.*/  
              else  
                {  
                die(print_r($errors, true));  
                }  
            }  
          else  
            {  
            echo "Registration complete.</br>";  
            }  
        }  
    }  
  
/*Display registered people.*/  
$sql = "SELECT * FROM tabela ORDER BY name"; 
$stmt = sqlsrv_query($conn, $sql); 
if($stmt === false) 
{ 
die(print_r(sqlsrv_errors(), true)); 
} 
 
if(sqlsrv_has_rows($stmt)) 
{ 
print("<table border='1px'>"); 
print("<tr><td>RB</td>"); 
print("<td>IME</td>"); 
print("<td>PREZIME</td>"); 
 
 
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
