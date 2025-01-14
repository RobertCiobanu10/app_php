<?php
session_start();
if (isset($_SESSION['username']))
{
    $mysql_server = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '1234';
    $mysql_database = 'app_bd';
    $mysql_table = 'products';
    //$redirect_error = 'http://localhost/x/signup.php?eroare=';
    //$success_page = 'http://localhost/x/signup.php';
    $error_message = '';
    $tagah = "<a href='index.php'>Home</a>";
    $tagavc = "<a href='orders.php'>Vezi comenzile</a>";
    $tagai = "<a href='init.php'>Initiaza o comanda</a>";
    
    
    
    if (isset($_POST["record"]))
    {
       $newcod = $_POST['cod'];
       $newnume = $_POST['nume'];
       $newum = $_POST['um'];
       $pret = $_POST['pret'];
       $cant = $_POST['cantitate'];
       
    



       if (!preg_match("/^[A-Za-z0-9-_!@$]{1,50}$/", $newnume))
       {
          $error_message = "Nume invalid";   
       }
       else
       if (!preg_match("/^[A-Za-z0-9-_!@$ ]{1,50}$/", $newum))
       {
          $error_message = "Nume invalid";   
       }
       else
       if (!preg_match("/[0-9]/", $pret))
       {
          $error_message = "Pret invalid";   
       }
       else
       if (!preg_match("/[0-9]/", $cant))
       {
          $error_message = "Cantitate invalida";   
       }
    
    
    
       if (empty($error_message))
       {
          $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password,$mysql_database);
          if (!$db)
          {
             die('Failed to connect to database server!<br>'.mysqli_error($db));
          }
          mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
          mysqli_set_charset($db, 'utf8');
          $sql = "SELECT cod_pr FROM ".$mysql_table." WHERE cod_pr = '".$newcod."'";
          $result = mysqli_query($db, $sql);
          if ($data = mysqli_fetch_array($result))
          {
             $error_message = 'Cod deja inregistrat. Cantitatea a fost adaugata la cantitatea existenta';
            $newcod = mysqli_real_escape_string($db, $newcod);     
             //$cant = mysqli_real_escape_string($db, $cant);                         
             $sqll = "UPDATE `products` SET `cant_pr` = cant_pr+".$cant." WHERE `cod_pr` = '$newcod'"; 
             $resultt = mysqli_query($db, $sqll);                                                                                                              
          }
       }
    
    
    
       if (empty($error_message))
       {
          $newcod = mysqli_real_escape_string($db, $newcod);
          $newnume = mysqli_real_escape_string($db, $newnume);
          $newum = mysqli_real_escape_string($db, $newum);
          $pret = mysqli_real_escape_string($db, $pret);
          $cant = mysqli_real_escape_string($db, $cant);
          $sql = "INSERT INTO $mysql_table (`cod_pr`, `nume_pr`, `u/m`, `pret_pr`, `cant_pr`) VALUES ('$newcod', '$newnume', '$newum', '$pret', '$cant')";
          $result = mysqli_query($db, $sql);
          mysqli_close($db);
    
          $error_message = "<td style='color:green'>produs inregistrat</td>";
       }
    }
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password,$mysql_database);
   mysqli_select_db($db, $mysql_database);
   $sqlquery = "select * from products";
   $sqlrez = mysqli_query($db, $sqlquery);
   $nr = 0;
   
   echo "<table border=1 style='position:relative;left:875px;top:100px;border-color:red;padding:10px;'>";
   echo "<tr><td>Nr.crt.</td><td>Cod produs</td><td>Nume produs </td><td>Unitate de masura </td><td>Pret (LEI) </td><td>Cantitate </td></tr><br><tr>";
   while ($data = mysqli_fetch_array($sqlrez)){
      $nr = $nr + 1;
      
      echo "<td>".$nr.".</td><td>".$data['cod_pr']."</td><td>".$data['nume_pr']."</td><td>".$data['u/m']."</td><td>".$data['pret_pr']."</td><td>".$data['cant_pr']."</td></tr><br>";
   }
   echo "</table>";
}
?>