<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 1
$fruit = "kokosnoot";
$fruitLen = strlen($fruit);
$fruitNeedle = "o";
$fruitPos = strpos($fruit, $fruitNeedle);

//Deel 2
$fruit2 = "ananas";
$fruit2Needle = "a";
$fruit2Pos = strrpos($fruit2, $fruit2Needle);
$fruit2Uppercase = strtoupper($fruit2);

//Deel 3
$lettertje = "e";
$cijfertje = "3";
$langsteWoord = "zandzeepsodemineralenwatersteenstralen";
$langsteWoordReplace = str_replace($lettertje, $cijfertje, $langsteWoord);


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

		<h3>Deel 1</h3>

		<p><?= $fruit, " heeft ", $fruitLen, " tekens." ?></p>

		<p><?= "Positie van eerste ", $fruitNeedle, " in ", $fruit, ": ", "$fruitPos"?></p>


		<h3>Deel 2</h3>

		<p><?= "Positie van laatste ", $fruit2Needle, " in ", $fruit2, ": ", $fruit2Pos ?></p>

		<p><?= $fruit2, " in uppercase: ", $fruit2Uppercase ?></p>

		<h3>Deel 3</h3>

		<p><?= $langsteWoord, " met alle \"", $lettertje, "\"'s vervangd door \"", $cijfertje, "\": ", $langsteWoordReplace?></p>

</section>

</body>
</html>