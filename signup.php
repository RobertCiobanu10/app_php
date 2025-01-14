<?php
   include "signup_fct.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<link href="Untitled1.css" rel="stylesheet">
<link href="signup.css" rel="stylesheet">

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
<div id="wb_Heading1" style="position:absolute;left:37px;top:35px;width:669px;height:41px;z-index:2;">
<h4 id="Heading1">Creează un cont pe baza ID-ului angajatului</h4></div>
<a href='index.php'>Log in</a>
<div id="wb_Signup1" style="position:absolute;left:335px;top:300px;width:299px;height:420px;z-index:1;">
<form name="signupform" method="post" accept-charset="UTF-8" id="signupform">
<input type="hidden" name="form_name" value="signupform">
<table id="Signup1">
<tr>
   <td class="header">Sign up for a new account</td>
</tr>
<tr>
   <td class="label"><label for="fullname">Full Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="fullname" type="text" id="fullname"></td>
</tr>
<tr>
   <td class="label"><label for="username">User Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="username" type="text" id="username"></td>
</tr>
<tr>
   <td class="label"><label for="password">Password</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="password" type="password" id="password"></td>
</tr>
<tr>
   <td class="label"><label for="confirmpassword">Confirm Password</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="confirmpassword" type="password" id="confirmpassword"></td>
</tr>
<tr>
   <td class="label"><label for="id">ID angajat</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="id" type="text" id="id"></td>
</tr>
<tr>
   <td class="label"><label for="cnp">CNP</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="cnp" type="text" id="cnp"></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input style="cursor:pointer;" class="button" type="submit" name="signup" value="Create User" id="signup"></td>
</tr>
<tr>
   <td style="color:red;"><?php  echo $error_message; ?></td>
</tr>

</table>
</form>
</div>

</body>
</html>