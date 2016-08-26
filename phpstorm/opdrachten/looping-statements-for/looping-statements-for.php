<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

//Deel 1 & 2
$rijen = 10;
$kolommen = 10;

//Deel 3
$rijen = array();

for ($i = 0; $i <= 10; $i++) {
	$kolom = array();
	for ($o = 1; $o <= 10; $o++) {
		$kolom[$o] = $i * $o;
	}
	$rijen[$i] = $kolom;
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

	<style>

		.oneven
		{
			background-color	:	lightgreen;
		}

	</style>
</head>

<body class="web-backend-inleiding">

	<section class="body">

		<h1>Looping Statements For</h1>

		<h3>Deel 1 & 2</h3>

		<table>
			<?php
				for ($i = 0; $i <= 10; $i++) {
					echo "<tr>";
					for ($o = 1; $o <= 10; $o++) echo "<td class =" . ((($i*$o)%2) ? "oneven" : "") . ">" . $i * $o ."</td>";
					echo"</tr>";
				}
			?>
		</table>


		<h3>Deel 3</h3>

		<pre><?php print_r($rijen) ?></pre>

		<table>
			<?php
				echo "no thx";
			?>
		</table>


</section>

</body>
</html>