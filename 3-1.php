<?php
$hour = date('H');
$page = file_get_contents('data/file1.html');
if($hour < 12){
	$page = str_replace('!greeting!', 'Good Morning.', $page);
}elseif($hour < 17){
	$page = str_replace('!greeting!', 'Good Afternoon.', $page);
}else{
	$page = str_replace('!greeting!', 'Good Evening.', $page);
}
echo $page;
?>