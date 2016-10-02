<?php
$user_name = 'admin';
$password = 'password';
if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $user_name) || ($_SERVER['PHP_AUTH_PW'] != $password)){
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="BBS"');
	exit('<p>Please confirm your user name and password.</p>');
}

$lines = file('data/bbs2.txt');
$j = 0;
$error = '';
$msg = '';

if (isset($_POST['submit'])){
	if(isset($lines[0])){
		$items = explode("\t", $lines[0]);
	}else{
		$items[0] = 0;
	}
	$num = $items[0] + 1;
	$title = htmlspecialchars($_POST['title']);
	$contents = htmlspecialchars($_POST['contents']);
	$contents = str_replace("\r\n", "<br>", $contents);
	$contents = str_replace("\r", "<br>", $contents);
	$contents = str_replace("\n", "<br>", $contents);
	$time = date("Y/m/d H:i:s");
	if(!$_POST['title']){
	$title = 'No Title';
	}
	if(!$_POST['contents']){
	$error .= '<p class="error">Please write your comment.</p>';
	}
	if($error == ''){
		$data = "$num\t$title\t$time\t$contents\n";
		array_unshift($lines, $data);
		$msg = '<p class="msg">Posted an Article!</p>';
	}
}

if(isset($_POST['delete'])){
	foreach($_POST['delete_num'] as $values){
		array_splice($lines, $values - $j, 1);
		$j++;
	}
		$msg = '<p class="msg">Deleted Articles!</p>';
}
$delete_table =<<<EOD
<table>
<tr>
<td>Delete</td>
<td>Title</td>
<td>Time</td>
<td>Comment</td>
</tr>
EOD;

$i = 0;
foreach($lines as $line) {
	$line = rtrim($line);
	$items = explode("\t", $line);
	$delete_table .= '<tr><td>';
	$delete_table .= '<input type="checkbox" name="delete_num[]" value="'.$i.'"></td><td>';
	$delete_table .= $items[1].'</td><td>';
	$delete_table .= $items[2].'</td><td>';
	$delete_table .= $items[3].'</td></tr>';
	$i++;
}
$delete_table .= '</table>';

$fh = fopen('data/bbs2.txt', 'w');
foreach($lines as $line){
	fwrite($fh, $line);
}
fclose($fh);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Information Board | Administrator</title>
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<h1>Administrator Page</h1>
<p><a href="3-7.php">Information Board</a> | <a href="3-8.php">Administrator</a></p>
<?php echo $msg; ?>
<section>
<h2>Post Article</h2>
<?php echo $error; ?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<table>
<tr>
	<th>Title</th>
	<td><input type="text" name="title"></td>
</tr>
<tr>
	<th>Comment</th>
	<td><textarea name="contents" cols="40" rows="5"></textarea></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" name="submit" value="post"></td>
</tr>
</table>
</form>
</section>
<section>
<h2>Delete Articles</h2>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<?php echo $delete_table; ?>
<p><input type="submit" name="delete" value="delete"></p>
</form>
</section>
</body>
</html>
