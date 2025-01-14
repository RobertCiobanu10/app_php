<?php
    include "add_fct.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>

<link href="Untitled1.css" rel="stylesheet">
<link href="record.css" rel="stylesheet">
<style>
a {
   margin: 20px;
   background-color: moccasin;
   position:relative;
   top:50px;
   left:400px;
   padding:10px;
   color:black;
}
td {
    padding:5px;
}

   </style>
</head>
<body>


<div id="wb_Form1" style="position:absolute;left:100px;top:117px;width:280px;height:288px;z-index:12;">
<form name="Form1" method="post" enctype="multipart/form-data" id="Form1">
<input type="text" id="cod" style="position:absolute;left:108px;top:18px;width:135px;height:18px;z-index:0;" name="cod" value="" spellcheck="false">
<label for="" id="Label1" style="position:absolute;left:52px;top:19px;width:48px;height:19px;line-height:19px;z-index:1;">Cod</label>
<label for="" id="Label2" style="position:absolute;left:52px;top:60px;width:48px;height:19px;line-height:19px;z-index:2;">Nume</label>
<input type="text" id="nume" style="position:absolute;left:108px;top:59px;width:135px;height:18px;z-index:3;" name="nume" value="" spellcheck="false">
<input type="text" id="um" style="position:absolute;left:108px;top:102px;width:135px;height:18px;z-index:4;" name="um" value="" spellcheck="false">
<input type="text" id="pret" style="position:absolute;left:108px;top:146px;width:135px;height:18px;z-index:5;" name="pret" value="" spellcheck="false">
<input type="text" id="cantitate" style="position:absolute;left:108px;top:192px;width:135px;height:18px;z-index:6;" name="cantitate" value="" spellcheck="false">
<label for="" id="Label3" style="position:absolute;left:49px;top:103px;width:48px;height:19px;line-height:19px;z-index:7;">U/M</label>
<label for="" id="Label4" style="position:absolute;left:52px;top:147px;width:48px;height:19px;line-height:19px;z-index:8;">Preț (LEI)</label>
<label for="" id="Label5" style="position:absolute;left:35px;top:193px;width:65px;height:19px;line-height:19px;z-index:9;">Cantitate</label>
<label style="position:absolute;left:35px;top:240px;width:65px;height:19px;line-height:19px;z-index:9;"><?php  echo $error_message;  ?></label>

<input type="submit" id="record" name="record" value="Submit" style="position:absolute;left:93px;top:241px;width:95px;height:25px;z-index:10;">
</form>
</div>
<?php echo $tagah,$tagavc,$tagai;?>

<div id="wb_Heading1" style="position:absolute;left:85px;top:36px;width:247px;height:46px;z-index:13;">
<h1 id="Heading1">Adaugă produs</h1></div>
<h2 style="position:absolute;left:875px;top:40px; id="Heading1">Produse gestiune</h1>

</body>
</html>