<?php
$mysql_server = 'localhost';
$mysql_username = 'root';
$mysql_password = '1234';
$mysql_database = 'app_bd';
$mysql_table = 'data_login';
//$redirect_error = 'http://localhost/x/signup.php?eroare=';
//$success_page = 'http://localhost/x/signup.php';
$error_message = '';


if (isset($_POST["signup"]))
{
   $newusername = $_POST['username'];
   $newid = $_POST['id'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   $newcnp = $_POST['cnp'];
   

   if ($newpassword != $confirmpassword)
   {
      $error_message = "Parola invalida";    
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$ ]{1,50}$/", $newusername))
   {
      $error_message = "Username invalid";   
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$]{1,50}$/", $newpassword))
   {
      $error_message = "Parola invalida";   
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$ ]{1,50}$/", $newfullname))
   {
      $error_message = "Nume invalid";   
   }
   else
   if (!preg_match("/[0-9]/", $newid))
   {
      $error_message = "ID invalid";   
   }
   else
   if (!preg_match("/[0-9]/", $newcnp))
   {
      $error_message = "CNP invalid";   
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
      $sql = "SELECT username FROM ".$mysql_table." WHERE username = '".$newusername."'";
      $result = mysqli_query($db, $sql);
      if ($data = mysqli_fetch_array($result))
      {
         $error_message = 'Username already used. Please select another username.';
      }
   }



   if (empty($error_message))
   {
      
      $crypt_pass = md5($newpassword);
      $newusername = mysqli_real_escape_string($db, $newusername);
      $newfullname = mysqli_real_escape_string($db, $newfullname);
      $sqlidang = "SELECT id_ang FROM employees WHERE id_ang=".$newid;
      $rez = mysqli_query($db,$sqlidang);
      $data = mysqli_fetch_array($rez);
      $f = $data[0];

      if ($newid == $f) {

         $sql = "INSERT INTO $mysql_table (`id_ang`, `cnp`, `fullname`, `username`, `password`,`id_cont`) VALUES ('$f', '$newcnp', '$newfullname', '$newusername', '$crypt_pass','')";
         $result = mysqli_query($db, $sql);
         mysqli_close($db);

         $error_message = "<td style='color:green'>cont inregistrat</td>";
      }
      else{
         $error_message = "<td style='color:red'>Nu corespunde cu ID-ul angajatului</td>";
      }
   }
}
?>