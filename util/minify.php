<?php

function minify_html($html)
{
	$search = array(
			'/(\n|^)(\x20+|\t)/',
			'/(\n|^)\/\/(.*?)(\n|$)/',
			'/\n/',
			'/\<\!--.*?-->/',
			'/(\x20+|\t)/', # Delete multispace (Without \n)
			'/\>\s+\</', # strip whitespaces between tags
			'/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
			'/=\s+(\"|\')/'); # strip whitespaces between = "'

	$replace = array(
			"\n",
			"\n",
			" ",
			"",
			" ",
			"><",
			"$1>",
			"=$1");

	return preg_replace($search, $replace, $html);
}