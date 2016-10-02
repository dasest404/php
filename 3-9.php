<?php
$lines = file('data/bbs3.txt');
$max_width = 300;
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
  if(isset($items[4])){
	$image_size_info = getimagesize("images/".$items[4]);
	if($image_size_info){
		if($image_size_info[0] > $max_width){
			$size_rate = $max_width / $image_size_info[0];
			$w = $max_width;
			$h = $image_size_info[1] * $size_rate;
		}else{
			$w = $image_size_info[0];
			$h = $image_size_info[1];
		}
	}else{echo "Error";}
	$articles .= '<p><img src="images/'.$items[4].'" alt="article image" width="'.$w.'" height="'.$h.'"></p>'."\n";
  }
  $articles .= "<p>".$items[3]."</p><hr>\n";
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
<p><a href="3-9.php">Information Board</a> <a href="3-10.php">Administrator</a></p>
<div>
<?php echo $articles; ?>
</div>
</body>
</html>