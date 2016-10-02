<!doctype html>
<html>
<head>
<title>Basic Grammars</title>
</head>
<body>
<?php
if(isset($box1)){
	echo "\$box1 exists<br>";
}else{
	echo "\$box1 does not exist<br>";
}

$box2 = 3;
if($box2){
	echo "\$box2 is $box2<br>";
}else{
	echo "\$box2 does not exist<br>";
}

$box3 = 5;
$box4 = 10;
$box5 = "10";
if($box3 == $box4){echo "box3 equal box4<br>";}
if($box3 != $box4){echo "box3 is not equal box4<br>";}
if($box3 < $box4){echo "box3 is less than box4<br>";}
if($box4 <= $box5){echo "box4 is less than or equal box5<br>";}
if($box4 === $box5){echo "box4 is less than box5<br>";}
if(($box3 < $box4) && ($box4 == $box5)){echo "both is true<br>";}

$box6 = 1;
while($box6 <= 5){
	echo $box6."<br>";
	$box6++;
}

for($box7=1;$box7<=6;$box7++){
	echo $box7."<br>";
}

$favorite = array(
	"john"=>"tea",
	"mike"=>"coffee",
	"mary"=>"water"
);
foreach($favorite as $aaa => $bbb){
	echo "the key is ".$aaa.", and the value is ".$bbb.".<br>";
}
foreach($favorite as $aaa => $bbb){
	$bbb = "chai";
}
foreach($favorite as $aaa => $bbb){
	echo "the key is ".$aaa.", and the value is ".$bbb.". (not changed)<br>";
}
foreach($favorite as $aaa => $bbb){
	$favorite[$aaa] = "chai";
}
foreach($favorite as $aaa => $bbb){
	echo "the key is ".$aaa.", and the value is ".$bbb.".<br>";
}

$classlist = array(
	"john",
	"mike",
	"mary"
);
foreach($classlist as $aaa){
	echo "the value is ".$aaa."<br>";
}
foreach($classlist as $aaa => $bbb){
	echo "the key is ".$aaa."<br>";
}
for($box8=0,$num_classmember=count($classlist);$box8<$num_classmember;$box8++){
	echo "Number ".$box8." is ".$classlist[$box8].".<br>";
}

function AA(){
	echo "Hello World!!<br>";
}
AA();

function BB($box9){
	echo "My message is ".$box9.". <br>";
}
BB("\"thank you\"");
BB();

function CC($box10 = "\"good bye\""){
	echo "my message is $box10. <br>";
}
CC();
CC("\"hello\"");

function FivePercentTaxAmount($beforetax){
	$tax = $beforetax*0.05;
	$aftertax = $beforetax + $tax;
	echo $aftertax."<br>";
}
FivePercentTaxAmount(1000);

function AutoTaxAmount($beforetax,$tax_rate=0.05){
	$tax = $beforetax*$tax_rate;
	$aftertax = $beforetax + $tax;
	return $aftertax;
}
$your_price = AutoTaxAmount(2000,0.1);
echo $your_price."<br>";

?>
</body>
</html>