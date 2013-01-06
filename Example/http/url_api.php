<?php 

parse_url($url);
/*
parse_url('http://localhost/a/admin/word/build');
Array
(
    [scheme] => http
    [host] => localhost
    [path] => /a/admin/word/build
)
*/

parse_str('a=1&b=2', $output);
/*
$output = Array
(
    [a] => 1
    [b] => 2
)
*/

basename($url);
/*
$r = basename('http://localhost/a/admin');
$r == 'http://localhost/a';
 */