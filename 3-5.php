<?php
$fh = fopen('data/newfile1.txt', 'w');
fwrite($fh,"hello.\n");
fclose($fh);
$fh2 = fopen('data/newfile2.txt', 'a');
fwrite($fh2,"hello.\n");
fclose($fh2);
?>