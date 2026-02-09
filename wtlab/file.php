<?php  
$file=$_GET['file'] ?? 'hello.txt';

#file functions

// fopen() - open fil
file($file); // read file into an array   
echo fread(fopen($file, 'r'), filesize($file)); // read file content


