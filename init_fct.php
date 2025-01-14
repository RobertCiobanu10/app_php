<?php
session_start();
if (isset($_SESSION['username']))
{
    $mysql_server = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '1234';
    $mysql_database = 'app_bd';
    $mysql_table = 'products';
    $mysql_table2 = 'orders';
    $error_message = '';
    $tagah = "<a style='position:absolute;left:300px;top:-100px;' href='index.php'>Home</a>";
    $tagavc = "<a style='position:absolute;left:370px;top:-100px;' href='orders.php'>Vezi comenzile</a>";

    
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password,$mysql_database);
   mysqli_select_db($db, $mysql_database);
   $sqlquery = "select * from products";
   $sqlrez = mysqli_query($db, $sqlquery);
   $nr = 0;
   

   if (isset($_POST['order'])){

      echo "<table border=1 style='position:relative;left:730px;top:200px;border-color:red;padding:10px;'>";
      echo "<tr><td>Nr.crt.</td><td>Cod produs</td><td>Nume produs </td><td>Unitate de masura </td><td>Pret (LEI) </td></tr><br><tr>";

      $prod = $_POST['check'];
      $cant = $_POST['cant'];
      $total = 0;
      $i = [];
      $j = [];
      $cod_prod = [];
      $y = 0;

      foreach ($prod as $unic){
         $cod_prod[$nr] = $unic;
         $nr = $nr + 1;
         echo "<td>".$nr.".</td><td>".$unic."</td>";    
         $sqlqueryy = "select * from products where cod_pr = '".$unic."'";
         $sqlrezz = mysqli_query($db, $sqlqueryy);

         while ($data = mysqli_fetch_array($sqlrezz)){
            $data['pret_pr'] = (int) $data['pret_pr'];
            $i[$y] = $data['pret_pr'];
            $j[$y] = $data['cant_pr'];
            echo "<td>".$data['nume_pr']."</td><td>".$data['u/m']."</td><td>".$i[$y]."</td></tr>";
            $y = $y+1;
         } 
      }   
      echo "</table>";


      echo "<h1 style='position:absolute;left:800px;top:150px;'>Raport</h1><table border=1 style='position:relative;left:1250px;top:130px;border-color:red;padding:10px;'>";
      echo "<tr><td>Cantitate ceruta</td><td>Total</td></tr>";
      $h = 0;
      foreach ($cant as $unicc){       
         if ($unicc > 0 && $unicc <= $j[$h]){
            echo "<tr><td>".$unicc."</td>";
            echo "<td>".$unicc*$i[$h]."</td></tr>";
            $total += $unicc*$i[$h];
            
            $sqlqueryyy = "UPDATE `products` SET `cant_pr` = `cant_pr`-".$unicc." WHERE `products`.`cod_pr` = '".$cod_prod[$h]."'";
            $sqlrezzz = mysqli_query($db, $sqlqueryyy);
            $h = $h+1;
         }        
      }  
      echo "<tr><td>Total comanda (LEI)</td></tr>";
      echo "<tr><td>".$total."</td></tr>";
      echo "</table>"; 
      if (isset($_POST['contcom']) && isset($_POST['numecl']) && $total > 0) {
         $datac = date("Y-m-d");
         $contc = $_POST['contcom'];
         $numec = $_POST['numecl'];
         $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password,$mysql_database);
         if (!$db)
         {
            die('Failed to connect to database server!<br>'.mysqli_error($db));
         }
         mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
         mysqli_set_charset($db, 'utf8');
         $sql = "INSERT INTO orders (`nr_com`, `data_com`, `continut_com`, `pret_com`, `nume_cl`) VALUES ('', '$datac', '$contc', '$total', '$numec')";
         $result = mysqli_query($db, $sql);
         mysqli_close($db);

         $error_message = "Comanda inregistrata";
      }
      else {
         $error_message = "Comanda nu s-a inregistrat";
      }
   }
}
?>