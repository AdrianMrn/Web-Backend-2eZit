<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 1
$i = 0;
$j = 40;

//Deel 2
$boodschappenlijstje = array("melk","brood","eieren","gehakt","water","kabels");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>

<body class="web-backend-inleiding">

	<section class="body">

		<h1>Looping Statements While</h1>

		<h3>Deel 1</h3>

		<p><?php
			while ($i<=100) {
				echo $i . ", ";
				$i++;
			}
			?></p>

		<p><?php
			while ($j<80) {
				echo ($j % 3) ? "" : $j . ", ";
				$j++;
			}
			?></p>


		<h3>Deel 2</h3>

		<ul>
			<?php
				$p = 0;
				while ($p < count($boodschappenlijstje)) {
					echo "<li>$boodschappenlijstje[$p]</li>";
					$p++;
				}
			?>
		</ul>

</section>

</body>
</html>