<!DOCTYPE html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
	<title>Arrays</title>
	<link href="opmaak.css" rel="stylesheet"/>
	<meta charset="UTF-8">
</head>

<body>
<?php
$fietsen = array( 
   "Capino", "Wilier", "Giant", "Gazelle", "Ghost", "Scott", "Specialized"
); 
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

<div id=intro>
<?PHP
echo '<pre>', print_r($telefoonmerken, true), '</pre>';
?>
</div>

<div id=intro>
<?php
foreach ($telefoonmerken as $telefoonmerk) {
              echo "<li>$telefoonmerk</li>";
          }
        
          unset($telefoonmerk);
?>
</div>

<div id=intro>
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
<div id="intro">
    sort($fietsen);
print join(", ", $fietsen);
</div>
</div>
</body>

</html>