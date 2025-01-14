<?php
    include "init_fct.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<link href="Untitled1.css" rel="stylesheet">
<link href="init.css" rel="stylesheet">
<style>
a {
   margin: 20px;
   background-color: moccasin;
   position:relative;

   left:300px;
   padding:10px;
   color:black;
}
td {
    padding:5px;
}
</style>
</head>
<body>
<div id="wb_Heading1" style="position:absolute;left:67px;top:36px;width:297px;height:46px;z-index:1;">
<h1 id="Heading1">Inițiază o comandă</h1></div>
<div id="wb_Text1" style="position:absolute;left:141px;top:155px;width:149px;height:125px;z-index:2;">
<?php echo $tagavc,$tagah; ?>
<form method="post">
<?php
echo "<table border=1 style='position:relative;top:0px;left:-50px;border-color:red;padding:10px;'>";
echo "<tr><td>Nr.crt.</td><td>Cod produs</td><td>Nume produs </td><td>Unitate de masura </td><td>Pret (LEI) </td><td>Cantitate </td><td>Alege</td><td>Alege cantitatea </td></tr><br><tr>";
while ($data = mysqli_fetch_array($sqlrez)){
   $nr = $nr + 1;
   echo "<td>".$nr.".</td><td>".$data['cod_pr']."</td><td>".
   $data['nume_pr']."</td><td>".$data['u/m']."</td><td>".
   $data['pret_pr']."</td><td>".$data['cant_pr']."</td><td><input name='check[]' type='checkbox' value='$data[cod_pr]'></td><td><input id='cant' name='cant[]' type='number' placeholder='Introdu cantitatea'></td></tr><br>";
}
echo "</table>";  

?>
<input type="submit" id="order" name="order" value="Înregistrează comanda" style="position:absolute;left:1050px;top:-130px;width:197px;height:46px;z-index:3;">
<input type="text" id="um" style="position:absolute;left:750px;top:-100px;width:135px;height:18px;z-index:4;" name="contcom" value="" spellcheck="false">
<input type="text" id="cantitate" style="position:absolute;left:750px;top:-60px;width:135px;height:18px;z-index:6;" name="numecl" value="" spellcheck="false">
<label for="" id="Label3" style="position:absolute;left:650px;top:-100px;width:48px;height:19px;line-height:19px;z-index:7;">Continutul</label>
<label for="" id="Label5" style="position:absolute;left:650px;top:-60px;width:65px;height:19px;line-height:19px;z-index:9;">Nume client</label>
<label style="position:absolute;left:1050px;top:-70px;width:200px;color:red;height:19px;line-height:19px;z-index:9;"><?php  echo $error_message;  ?></label>

</form>
</body>
</html>