<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 2
$fileContent = file_get_contents("text-file.txt");

$charArray = str_split($fileContent);

sort($charArray);

$charArray = array_map('strtolower', $charArray);

$tellerArray = array();

foreach ($charArray as $character) {
	if (ctype_alpha($character)) {
		if (isset($tellerArray[$character])) {
			$tellerArray[$character]++;
		} else {
			$tellerArray[$character] = 1;
		}
	}
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

		<h1>Looping Statements Foreach - Deel 2</h1>

		<h3>Deel 2</h3>

		<p><?= $fileContent ?></p>

		<pre><?php print_r($tellerArray) ?></pre>


</section>

</body>
</html>