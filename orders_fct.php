<?php
session_start();
if (isset($_SESSION['username']))
{
    $mysql_server = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '1234';
    $mysql_database = 'app_bd';
    $mysql_table = 'orders';
    //$redirect_error = 'http://localhost/x/signup.php?eroare=';
    //$success_page = 'http://localhost/x/signup.php';
    $error_message = '';
    

    
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password,$mysql_database);
   mysqli_select_db($db, $mysql_database);
   $sqlquery = "select * from orders";
   $sqlrez = mysqli_query($db, $sqlquery);
 
   
}
?>