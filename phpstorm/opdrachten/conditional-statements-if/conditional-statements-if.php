<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 1
$getal = 1;
$dag = "";

if ($getal == 1) $dag = "maandag";
if ($getal == 2) $dag = "dinsdag";
if ($getal == 3) $dag = "woensdag";
if ($getal == 4) $dag = "donderdag";
if ($getal == 5) $dag = "vrijdag";
if ($getal == 6) $dag = "zaterdag";
if ($getal == 7) $dag = "zondag";


//Deel 2
$dagA = strtoupper($dag);

$dagBpos = strrpos($dagA, "A");
$dagB = substr_replace($dagA, "a", $dagBpos, 1);
//$dagC



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

		<h1>Conditional Statements If</h1>

		<h3>Deel 1</h3>

		<p><?= "De ", $getal, "e dag van de week is ", $dag ?></p>


		<h3>Deel 2</h3>

		<p> <?= $dagA ?> </p>

		<p> <?= $dagB ?> </p>

</section>

</body>
</html>