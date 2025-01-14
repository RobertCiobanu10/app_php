<?php
   include "signin_fct.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<link href="Untitled1.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<style>
a {
   margin: 20px;
   background-color: moccasin;
   position:relative;
   top:200px;
   left:300px;
   padding:10px;
   color:black;
}
   </style>
</head>
<body>
<div id="wb_Heading1" style="position:absolute;left:170px;top:26px;width:577px;height:134px;z-index:1;">
<h1 id="Heading1">Aplicație de gestionare a activității de aprovizionare-desfacere dintr-o unitate economică</h1></div>


<hr id="HorizontalLine1" style="position:absolute;left:0px;top:152px;width:100%;z-index:2;">
<?php echo "<a href='signup.php'>Sign up</a>"; 
 if (isset($_SESSION['username'])) {
   echo "<a href='record.php'>Adauga produs</a>";
   echo "<a href='init.php'>Inregistreaza o comanda</a>";
   echo "<a href='orders.php'>Vezi comenzile</a>";
   echo '<div id="wb_Logout1" style="position:relative;left:900px;top:70px;width:94px;height:22px;text-align:center;z-index:4;">
   <form name="logoutform" method="post" id="logoutform">
   <input type="hidden" name="form_name" value="logoutform">
   <button type="submit" name="logout" value="Logout" id="Logout1">Logout</button>'.$b.'</div>';
   } 
?>
<div id="wb_Login1" style="position:relative;left:500px;top:300px;width:239px;height:242px;z-index:3;">
<form name="loginform" method="post" accept-charset="UTF-8" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header">Log In</td>
</tr>
<tr>
   <td class="label"><label for="username">User Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Password</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td>
</tr>
<tr>
   <td class="row"><input id="rememberme" type="checkbox" name="rememberme"><label for="rememberme">Aminteste-mi</label></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="login" value="Log In" id="login"></td>
</tr>
<tr>
   <td><?php echo $a;
   ?></td>
</tr>
</table>
</form>
</div>




</form>
</div>
</body>
</html>