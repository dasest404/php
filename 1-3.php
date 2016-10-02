<!doctype html>
<html>
<head>
<title>Basic Grammars</title>
</head>
<body>
<?php
echo "hello world!<br>";
$box = "Apple";
echo $box."<br>";
$box2 = 'Orange';
echo $box2.'<br>';
echo "This is $box<br>";
echo 'This is $box<br>';
echo "These are {$box2}s<br>";
echo "<p>This is $box.</p>\n<p>He said \"Hello\".</p>\n";
echo <<<AAA
<p>This is an $box.</p>
<p>That is an $box2.</p>
AAA;

echo <<<'BBB'
<p>This is an $box.</p>
<p>That is an $box2.</p>
BBB;
$box3 = 10;
echo $box3 + 5 . "<br>";
$box3++;
echo $box3 . "<br>";
$box3 = $box3 - 3;
echo $box3 . "<br>";
$box3 = $box3 * 2 / 4;
echo $box3 . "<br>";
$box3--;
echo $box3 . "<br>";
$box3 = $box3 % 2;
echo $box3 . "<br>";
$colors[0] = "red";
$colors[1] = "green";
$colors[2] = "Yellow";
print_r ($colors);
$favorite = array(
	"john"=>"tea",
	"mike"=>"coffee",
	"mary"=>"water"
);
echo $favorite['mike'] . "<br>";
?>
</body>
</html>