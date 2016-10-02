<!doctype html>
<html>
<head>
<title>Favorite Drink</title>
</head>
<body>
<ul>
<?php
$lines = file('data/file3.txt');
foreach($lines as $line) {
	$line = rtrim($line);
	$info = explode("\t", $line);
	echo "<li>".$info[0]." loves ".$info[1].".</li>\n";
}
?>
</ul>
</body>
</html>