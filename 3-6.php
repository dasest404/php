<!doctype html>
<html class="no_admin">
<head>
<meta charset="utf-8">
<title>BBS</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>BBS</h1>
<div class="input_area">
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<table>
<tr>
	<th>Name</th>
	<td><input type="text" name="name"></td>
</tr>
<tr>
	<th>Title</th>
	<td><input type="text" name="title"></td>
</tr>
<tr>
	<th>comment</th>
	<td><textarea name="contents" cols="40" rows="5"></textarea></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" name="submit" value="post"></td>
</tr>
</table>
</form>
</div>
<div class="comment_area">
<?php
$lines = file('data/bbs.txt');

if (isset($_POST['submit'])){
  $name = htmlspecialchars($_POST['name']);
  $title = htmlspecialchars($_POST['title']);
  $contents = htmlspecialchars($_POST['contents']);
  $contents = str_replace("\r\n", "<br>", $contents);
  $contents = str_replace("\r", "<br>", $contents);
  $contents = str_replace("\n", "<br>", $contents);
  $time = date("Y/m/d H:i:s");
  $data = "$name\t$title\t$time\t$contents\n";
  array_unshift($lines, $data);
}

foreach($lines as $line) {
  $line = rtrim($line);
  $items = explode("\t", $line);
  echo "<p>Name: ".$items[0]."</p>";
  echo "<p>Title: ".$items[1]."</p>";
  echo "<p>Time: ".$items[2]."</p>";
  echo "<p>".$items[3]."</p><hr>";
}

$fh = fopen('data/bbs.txt', 'w');
foreach($lines as $line) fwrite($fh, $line);
fclose($fh);

?>
</div>
</body>
</html>