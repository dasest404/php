<?php
$contents =<<<EOD
This is a test of file_put_contents.
This message will be written in a txt file.
EOD;
file_put_contents('data/file2.txt',$contents);
?>