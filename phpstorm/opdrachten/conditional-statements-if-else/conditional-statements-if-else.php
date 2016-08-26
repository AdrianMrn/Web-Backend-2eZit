<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 1
$jaar = 2004;

$bool = ((($jaar % 4 == 0) && ($jaar % 100 != 0)) || ($jaar % 400 == 0)) ? " een schrikkeljaar" : " geen schrikkeljaar";

//Deel 2
$seconden = 120000000001;

$minuten = floor($seconden /60);
$uren = floor($minuten /60);
$dagen = floor($uren /24);
$weken = floor($dagen /7);
$maanden = floor($dagen /31);
$jaren = floor($dagen /365);


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

		<h1>Conditional Statements If Else</h1>

		<h3>Deel 1</h3>

		<p><?= "Het jaar ", $jaar, " is", $bool ?></p>


		<h3>Deel 2</h3>

		<p><?= "in ", $seconden, " seconden zitten: " ?></p>

		<ul>
			<li><?= $minuten, " minuten" ?></li>
			<li><?= $uren, " uren" ?></li>
			<li><?= $dagen, " dagen" ?></li>
			<li><?= $weken, " weken" ?></li>
			<li><?= $maanden, " maanden (31 dagen/maand)" ?></li>
			<li><?= $jaren, " jaren (365 dagen/jaar)" ?></li>
		</ul>

</section>

</body>
</html>