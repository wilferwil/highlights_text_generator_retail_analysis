<?php

$prefix_dir = date("Y-m-d_H") . 'h';



file_put_contents('./pasta/' . $prefix_dir . $posfix_dir . '/' . $filename . '.html', $content);

$url = "http://casadaconsultoria.com.br/wp-content/uploads/2012/05/A-importancia-da-embalagem-do-produto-300x213.jpg";
$path = parse_url($url, PHP_URL_PATH);
$parts = explode('/', $path);
$last = array_pop($parts);
$parts = array(implode('/', $parts), $last);
$posfix_dir = $parts[0];

echo $posfix_dir;

	mkdir('./pasta/' . $prefix_dir . '/' . $posfix_dir,0777,true);

?>