<!doctype html>
<html>
<head>
<title>Favorite Drink</title>
</head>
<body>
<ul>
<?php
$fh = fopen('data/file3.txt','r');
for($line=fgets($fh);! feof($fh);$line=fgets($fh)){
	$line = rtrim($line);
	$info = explode("\t",$line);
	echo "<li>".$info[0]." loves ".$info[1].".</li>\n";
}
fclose($fh);
?>
</ul>
</body>
</html>