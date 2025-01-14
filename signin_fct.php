<?php
$a = '';
$b = '';
session_start();
$session_timeout = 1200; // dupa 20 de minute expira sesiunea (se delogheaza automat)
if (isset($_POST['login']))
{
   $crypt_pass = md5($_POST['password']);
   $success_page = 'http://localhost/x/index.php';
   $error_page = "http://localhost/x/index.php?eroare=";
   $mysql_server = 'localhost';
   $mysql_username = 'root';
   $mysql_password = '1234';
   $mysql_database = 'app_bd';
   $mysql_table = 'data_login';
   $found = false;
   $db_fullname = '';
   $db_username = '';
      
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password,$mysql_database);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   mysqli_set_charset($db, 'utf8');
   $sql = "SELECT * FROM ".$mysql_table." WHERE username = '".mysqli_real_escape_string($db, $_POST['username'])."'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      if ($crypt_pass == $data['password'])
      {
         $found = true;
         $db_fullname = $data['fullname'];
         $db_username = $data['username'];
      }
      
   }
   if (isset($_SESSION['username'])) {
      $a = "Deja logat ca ".$_SESSION['username'];
   }
   mysqli_close($db);
   if ($found == false)
   {
      //header('Location: '.$error_page);
      $a = "Autentificare neefectuata";
   }
   else
   {
      
      $_SESSION['fullname'] = $db_fullname;
      $_SESSION['username'] = $db_username;
      $_SESSION['expires_by'] = time() + $session_timeout;
      $_SESSION['expires_timeout'] = $session_timeout;
      $rememberme = isset($_POST['rememberme']) ? true : false;
      if ($rememberme)
      {
         setcookie('username', $db_username, time() + 3600*24*30);
         setcookie('password', $_POST['password'], time() + 3600*24*30);

      }
      $b = "Logat ca ".$_SESSION['username'];
      //header('Location: '.$success_page);
      //exit;
   }
}
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';

if (isset($_POST['logout']) || time() >= $_SESSION['expires_by'])
{
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
}
?>