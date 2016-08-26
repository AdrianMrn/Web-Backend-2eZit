<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 1
$arrayDieren = array("giraf","koe","kat","hond","eekhoorn","bison","mens","aap","schaap","mug");
$arrayDieren[5] = "berggeit";

$arrayVoertuigen["landvoertuigen"] = array("Vespa", "Fiets");
$arrayVoertuigen["watervoertuigen"] = array("Surfplank","Vlot","Zeilschip");
$arrayVoertuigen["luchtvoertuigen"] = array("Helikopter","Vliegtuig");


//Deel 2
$arrayGetallen = array(1,2,3,4,5);
$vermenigvuldiging = $arrayGetallen[0] * $arrayGetallen[1] * $arrayGetallen[2] * $arrayGetallen[3] * $arrayGetallen[4];

$arrayOneven = array();

for ($i = 0; $i < count($arrayGetallen); $i++) {
	if ($arrayGetallen[$i] %2) {
		array_push($arrayOneven, $arrayGetallen[$i]);
	}
}


$tweedeArray = array(5,4,3,2,1);
$derdeArray = array();

for ($i = 0; $i < count($tweedeArray); $i++) {
	array_push($derdeArray, $arrayGetallen[$i] + $tweedeArray[$i]);

}

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

		<h1>Arrays Basis</h1>

		<h3>Deel 1</h3>

		<pre>arrayDieren: <?php print_r($arrayDieren) ?></pre>

		<pre>arrayVoertuigen: <?php print_r($arrayVoertuigen) ?></pre>


		<h3>Deel 2</h3>

		<p><?= "Vermenigvuldiging: ", $vermenigvuldiging ?></p>

		<pre>arrayOneven: <?php print_r($arrayOneven); ?></pre>

		<pre>derdeArray: <?php print_r($derdeArray); ?></pre>

</section>

</body>
</html>