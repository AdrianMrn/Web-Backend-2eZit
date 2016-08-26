<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

$getal = 49;

$tiental = "";

if ($getal >= 0 && $getal <= 10) $tiental = " 1e ";
if ($getal >= 10 && $getal <= 20) $tiental = " 2e ";
if ($getal >= 20 && $getal <= 30) $tiental = " 3e ";
if ($getal >= 30 && $getal <= 40) $tiental = " 4e ";
if ($getal >= 40 && $getal <= 50) $tiental = " 5e ";
if ($getal >= 50 && $getal <= 60) $tiental = " 6e ";
if ($getal >= 60 && $getal <= 70) $tiental = " 7e ";
if ($getal >= 70 && $getal <= 80) $tiental = " 8e ";
if ($getal >= 80 && $getal <= 90) $tiental = " 9e ";
if ($getal >= 90 && $getal <= 100) $tiental = " 10e ";


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

		<h1>Conditional Statements If Else If</h1>

		<p><?= "Het getal ", $getal, " ligt in het ", $tiental, " tiental." ?></p>

		<p><?= strrev("Het getal " . $getal . " ligt in het " . $tiental . " tiental.") ?></p>


</section>

</body>
</html>