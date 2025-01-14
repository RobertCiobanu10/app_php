<?php
    include "orders_fct.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<link href="Untitled1.css" rel="stylesheet">
<link href="orders.css" rel="stylesheet">
<style>
a {
   margin: 20px;
   background-color: moccasin;
   position:relative;
   top:100px;
   left:350px;
   padding:10px;
   color:black;
}
td {
    padding:5px;
}
   </style>
</head>
<body>
<h1>Comenzi inregistrate</h1>
<a href='index.php'>Home</a>
<a href='init.php'>Initiaza o comanda</a>
<div id="wb_Text1" style="position:absolute;left:141px;top:155px;width:149px;height:54px;z-index:1;">
<?php
echo "<table border=1 style='position:relative;left:100px;border-color:red;padding:10px;'>";
echo "<tr><td>Numar comanda</td><td>Data comanda </td><td>Continut comanda</td><td>Pret comanda (LEI) </td><td>Nume client</td></tr><br><tr>";
while ($data = mysqli_fetch_array($sqlrez)){
   echo "<td>".$data['nr_com'].".</td><td>".$data['data_com']."</td><td>".
   $data['continut_com']."</td><td>".$data['pret_com']."</td><td>".
   $data['nume_cl']."</tr>";
}
echo "</table>";  
?>

</body>
</html>