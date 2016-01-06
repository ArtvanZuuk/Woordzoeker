<!DOCTYPE html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
	<title>Arrays</title>
	<link href="opmaak.css" rel="stylesheet"/>
	<meta charset="UTF-8">
</head>

<body>
<?php
$telefoonmerken = array(
				"HTC",
				"OnePlus",
				"LG",
				"Nexus",
				"Sony",
				"Apple",
				"Huawei",
				"Kaas"
);
?>


<div id=menu class=pos_fixed>
<ul>
<li><a href=http://goo.gl/XhsEBg>Hoofdpagina</a></li>
<li><a href=hobbys.html>Hobby's</a></li>
<li><a href=portfolio.html>Portfolio</a>
	<ul class=subMenu>
		<li><a href=favicon.html>Favicon</a></li>
		<li><a href=tabel.html>Tabel</a></li>
		<li><a href=contact.html>Formulier</a></li>
		<li><a href=nfc.html>Hardware</a></li>
		<li><a href=photoshop.html>Keuzeopdracht</a></li>
		<li><a href=PHP.php>PHP</a></li>
		<li><a href=Arrays.php>Arrays</a></li>
	</ul>
</li>
<li><a href=contact.html>Contact</a></li>	
</ul>
</div>

<div id=container>
<div id=titel>Arrays</div>
<div id=intro>
<?PHP
echo "$telefoonmerken[0] </br>
	  $telefoonmerken[1] </br>
	  $telefoonmerken[2] </br>
	  $telefoonmerken[3] </br>
	  $telefoonmerken[4] </br>
	  $telefoonmerken[5] </br>
	  $telefoonmerken[6] </br>
	  $telefoonmerken[7]        ";
?>

</div>

<div id=afbeelding>
<?PHP
echo '<pre>', print_r($telefoonmerken, true), '</pre>';
?>
</div>

<div id=array>
<?php
foreach ($telefoonmerken as $telefoonmerk) {
              echo "<li>$telefoonmerk</li>";
          }
        
          unset($telefoonmerk);
?>
</div>

<div id=array_rechts>
<?PHP
sort($telefoonmerken);
print join(", ", $telefoonmerken);
?>
</br>
</br>
<?PHP
rsort($telefoonmerken);
print join(", ", $telefoonmerken);
?>
</div>
<div id=volgende>
<a href=arrays2.php>volgende</a>
</div>
</div>
</body>

</html>