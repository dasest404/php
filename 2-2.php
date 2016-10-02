<?php
if(isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['comment'])){
	if($_POST['gender'] == 1){
		$gender = 'Mr.';
	}elseif($_POST['gender'] == 2){
		$gender = 'Ms.';
	}
	echo "Name: {$gender} {$_POST['name']}<br>";
	echo "Message: {$_POST['comment']}";
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
<form action="2-2.php" method="post">
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