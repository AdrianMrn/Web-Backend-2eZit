<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 1
$arrayDieren = array("koe","geit","kip","aap","haan","schaap");
$countArrayDieren = count($arrayDieren);

$teZoekenDier = "geit";
$boodschapZoekenDier = "Het dier \"" . $teZoekenDier . "\" staat " . ((in_array($teZoekenDier, $arrayDieren))?"wel":"niet") . " in de array.";

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

		<h1>Arrays Functions Deel 1</h1>

		<h3>Deel 1</h3>

		<p><?= "aantal dieren in \$arrayDieren: ", $countArrayDieren ?></p>

		<p><?= $boodschapZoekenDier ?></p>

		<h3>Deel 2 & 3</h3>
		<a href="arrays-functions-deel2.php">Clicky me!</a>

</section>

</body>
</html>