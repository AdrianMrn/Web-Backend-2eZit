<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 2
$arrayDieren = array("koe","geit","kip","aap","haan","schaap");
sort($arrayDieren);

$zoogdieren = array("dolfijn","vogelbekdier","walvis");

$dierenLijst = array_merge($arrayDieren,$zoogdieren);


//Deel 3
$numberArray = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
$uniqueArray = array_unique($numberArray);
sort($uniqueArray);

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

		<h1>Arrays Functions Deel 2</h1>

		<h3>Deel 1</h3>
		<a href="arrays-functions.php">Clicky me!</a>


		<h3>Deel 2</h3>

		<pre><?php print_r($arrayDieren) ?></pre>

		<pre><?php print_r($dierenLijst) ?></pre>


		<h3>Deel 3</h3>

		<pre><?php print_r ($uniqueArray) ?></pre>


</section>

</body>
</html>