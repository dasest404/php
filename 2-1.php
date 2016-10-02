<?php
if(isset($_GET['name']) && isset($_GET['gender']) && isset($_GET['comment'])){
	if($_GET['gender'] == 1){
		$gender = 'Mr.';
	}elseif($_GET['gender'] == 2){
		$gender = 'Ms.';
	}
	echo "Name: {$gender} {$_GET['name']}.<br>";
	echo "Message: {$_GET['comment']}";
}else{
	show_form();
}

function show_form(){
	echo <<<EOD
<html>
<head>
<title>Form</title>
</head>
<body>
<form action="2-1.php" method="get">
	<p>Name: <input type="text" name="name"></p>
	<p>
		Gender: 
		<select name="gender">
			<option value="1">male</option>
			<option value="2">female</option>
		</select>
	</p>
	<p><textarea name="comment"></textarea></p>
	<p><input type="submit" name="submit"></p>
</form>
</body>
</html>
EOD;
}
?>