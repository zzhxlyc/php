<?php
function UBB2HTML($output) {
	$output = htmlspecialchars(stripslashes($output));
	$output = ereg_replace(' ', '  ', $output);

	/* new paragraph */
	$output = str_replace('[p]', '<p>', $output);
	/* bold */
	$output = str_replace('[b]', '<strong>', $output);
	$output = str_replace('[/b]', '</strong>', $output);
	/* italics */
	$output = str_replace('[i]', '<i>', $output);
	$output = str_replace('[/i]', '</i>', $output);
	/* preformatted */
	$output = str_replace('[pre]', '<pre>', $output);
	$output = str_replace('[/pre]', '</pre>', $output);
	$output = str_replace('[u]', '<u>', $output);
	$output = str_replace('[/u]', '</u>', $output);
	/* indented blocks (blockquote) */
	$output = str_replace('[indent]', '<blockquote>', $output);
	$output = str_replace('[/indent]', '</blockquote>', $output);
	/* anchors */
	$output = ereg_replace('[anchor="([[:graph:]]+)"]', '<a name=��1��></a>', $output);
	/* links, note we try to prevent javascript in links */
	$output = str_replace('[link="javascript', '[link=" javascript', $output);
	$output = ereg_replace('[link="([[:graph:]]+)"]', '<a href=��1��>', $output);
	$output = str_replace('[/link]', '</a>', $output);
	$output = ereg_replace('[img="([[:graph:]]+)"]', '<div align=��center��><img src=��1��/>', $output);
	$output = str_replace('[/img]', '</div>', $output);
	return nl2br($output);
}
?>