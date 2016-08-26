<?php
/*
Adriaan Marain
adriaanmarain300@gmail.com
*/

$dagNummer = 7;
$dag = "";

switch($dagNummer)
{
	case 1:
		$dag = "maandag";
		break;
	case 2:
		$dag = "dinsdag";
		break;
	case 3:
		$dag = "woensdag";
		break;
	case 4:
		$dag = "donderdag";
		break;
	case 5:
		$dag = "vrijdag";
		break;
	case 6:
		$dag = "zaterdag";
		break;
	case 7:
		$dag = "zondag";
		break;
	default:
		$dag = "geen dag van de week";
		break;
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

		<h1>Conditional Statements Switch</h1>

		<p><?= "De ", $dagNummer, "e dag van de week is ", $dag, "." ?></p>

</section>

</body>
</html>