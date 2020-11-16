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

if (isset($_GET['action']))  
    {  
    if ($_GET['action'] == 'add')  
        {   
        $insertSql = "INSERT INTO tabela (rb,ime,prezime) VALUES (?,?,?)";  
        $params = array(&$_POST['t_rb'], &$_POST['t_ime'], &$_POST['t_prezime']);  
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





?></body></html>