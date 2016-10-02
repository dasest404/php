<?php
$lines = file('data/bbs2.txt');
if($lines){
	$articles = '';
}else{
	$articles = 'There are no information yet.';
}

foreach($lines as $line) {
  $line = rtrim($line);
  $items = explode("\t", $line);
  $articles .= "<p>Title: ".$items[1]."</p>\n";
  $articles .= "<p>Time: ".$items[2]."</p>\n";
  $articles .= "<p>Comment: ".$items[3]."</p><hr>\n";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Information Board</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Information Board</h1>
<p><a href="3-7.php">Information Board</a><a href="3-8.php">Administrator</a></p>
<div>
<?php echo $articles; ?>
</div>
</body>
</html>