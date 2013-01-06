<?php

$file = '';
$content = '';

$name = basename($file);	//返回文件名, 还可以剔除后缀
$dir = dirname(__FILE__);
chmod($filem, 0644);
is_writable($file);
file_exists($file);
filesize($file);

copy($a, $b);
unlink($file);	//删除
rename($a, $b);
mkdir($dir);
rmdir($dir);	//删除空的目录

$handler = fopen($file, 'w');
fwrite($handler, $content);
$handler = fopen($file, 'r');
$contents = fread($handle, filesize($file));
fclose($handler);

$content = file_get_contents($file);
file_put_contents($file, $content);

is_uploaded_file($file);
move_uploaded_file($_FILES['filename']['tmp_name'], 'a.file');

