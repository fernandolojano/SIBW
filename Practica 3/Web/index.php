<?php


	require_once "/usr/local/lib/php/vendor/autoload.php";
	include("bd.php");

	$loader = new \Twig\Loader\FilesystemLoader('Templates');
	$twig = new \Twig\Environment($loader);


	$bd = new BD();

	echo $twig->render('portada.html',['eventos' => $bd->getEventos()]);
?>
