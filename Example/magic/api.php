magic_quotes_gpc
get_magic_quotes_gpc()
影响到 HTTP 请求数据（GET，POST 和 COOKIE）。不能在运行时改变。在 PHP 中默认值为 on。
<?php 
function remove_magic_quotes_gpc($content){
	if (get_magic_quotes_gpc()) {
		return stripslashes($content);
	}
	else{
		return $content;
	}
}
?>



magic_quotes_runtime
如果打开的话，大部份从外部来源取得数据并返回的函数，包括从数据库和文本文件，
所返回的数据都会被反斜线转义。该选项可在运行的时改变，在 PHP 中的默认值为 off。
<?php 
get_magic_quotes_runtime();
set_magic_quotes_runtime(0);
?>





magic_quotes_sybase
如果打开的话，将会使用单引号对单引号进行转义而非反斜线。此选项会完全覆盖 magic_quotes_gpc。
如果同时打开两个选项的话，单引号将会被转义成 ”。而双引号、反斜线 和 NULL 字符将不会进行转义。

