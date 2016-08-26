<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

$voornaam = "Adriaan";
$achternaam = "Marain";

$volledigeNaam = $voornaam . " " . $achternaam;
$strLen = strlen($volledigeNaam);

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

		<h1>Comments</h1>

		<p><?= "Het aantal letters in ", $volledigeNaam, " is: " ?></p>
		<p><?= $strLen ?></p>

</section>

</body>
</html>